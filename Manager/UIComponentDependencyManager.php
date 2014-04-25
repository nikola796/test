<?php
class UIComponentDependencyManager
{

    private $libraryPaths = null;
    private $dependencyFilesPaths = null;
    private $excludedDependencies = null;
    private $minifiedFilesPaths = null;
    private $srcFilesPaths = null;
    private $loadedComponents = null;
    /**
     * @var UIComponentDependencyManager
     */
    private static $instance = null;

    private function __construct()
    {
        $this->libraryPaths = array();
        $this->dependencyFilesPaths = array();
        $this->excludedDependencies = array();
        $this->minifiedFilesPaths = array();
        $this->srcFilesPaths = array();
        $this->loadedComponents = array();

    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function read($file)
    {
        return json_decode(file_get_contents($file), true);
    }

    protected function get($file)
    {
        $filePath = $this->resolvePath($file);
        return $this->read($filePath);
    }

    public function excludeDependency($dependency)
    {
        if (!in_array($dependency, $this->excludedDependencies)) {
            array_push($this->excludedDependencies, $dependency);
        }
    }

    public function includeComponent($component)
    {
        if (!in_array($component, $this->loadedComponents)) {
            $componentParsed = $this->get($component);
            if (!empty($componentParsed['dependencies'])) {
                foreach ($componentParsed['dependencies'] as $dependency => $version) {
                    if (!in_array($dependency, $this->excludedDependencies)) {
                        $this->includeComponent($dependency);
                    }
                }
            }
            array_push($this->loadedComponents, $component);
        }
    }

    public function getComponents()
    {
        $src = array();
        $min = array();
        foreach ($this->loadedComponents as $component) {
            $src[$component] = $this->srcFilesPaths[$component];
            $min[$component] = $this->minifiedFilesPaths[$component];
        }
        return array("components" => $this->loadedComponents, "src" => $src, "minified" => $min);
    }

    private function resolvePath($file)
    {
        return $this->dependencyFilesPaths[$file];
    }

    public function addLibrary($library)
    {
        if (!isset($this->libraryPaths[$library->name])) {
            $this->libraryPaths[$library->name] = $library->path;
            $this->excludedDependencies = array_merge($this->excludedDependencies, $library->excludedDependencies);
            $this->dependencyFilesPaths = array_merge(
                $this->dependencyFilesPaths,
                $this->getFilesArray(
                    $library->dependencyFilesPath,
                    false,
                    $library->dependencyExtension,
                    $library->dependencyAliasPattern
                )
            );
            $this->srcFilesPaths = array_merge(
                $this->srcFilesPaths,
                $this->getFilesArray(
                    $library->srcFilesPath,
                    false,
                    $library->srcExtension,
                    $library->srcAliasPattern
                )
            );
            $this->minifiedFilesPaths = array_merge(
                $this->minifiedFilesPaths,
                $this->getFilesArray(
                    $library->minifiedFilesPath,
                    false,
                    $library->minifiedExtension,
                    $library->minifiedAliasPattern
                )
            );
        }
    }

    private function getFilesArray($root, $recursive = true, $extension = 'json', $aliasPattern)
    {

        $alias = array();
        $directories = array();
        $last_letter = $root[strlen($root) - 1];
        $root = ($last_letter == '\\' || $last_letter == '/') ? $root : $root . DIRECTORY_SEPARATOR;

        $directories[] = $root;

        while (sizeof($directories)) {
            $dir = array_pop($directories);
            if ($handle = opendir($dir)) {
                while (false !== ($file = readdir($handle))) {
                    if ($file == '.' || $file == '..') {
                        continue;
                    }
                    $file = $dir . $file;
                    if (is_dir($file) && $recursive) {
                        $directory_path = $file . DIRECTORY_SEPARATOR;
                        array_push($directories, $directory_path);
                    } elseif (is_file($file)) {
                        $key = basename($file);
                        $ext = pathinfo($key, PATHINFO_EXTENSION);
                        if ($ext == $extension) {
                            preg_match($aliasPattern, $key, $matchKey);
                            if (!empty($matchKey)) {
                                $alias[$matchKey[1]] = $file;
                            }
                        }
                    }
                }
                closedir($handle);
            }
        }

        return $alias;
    }
}

