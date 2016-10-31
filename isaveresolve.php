<?php

class iSaveResolve extends Module
{  

	public function __construct(){  
		$this->name = 'isaveresolve';
		$this->tab = 'tab';
		$this->version = '1.0';
		$this->bootstrap = true;
		$this->author = 'iPresta.ir';

		parent::__construct();
		$this->displayName = $this->l('Resolve save problems');
		$this->description = $this->l('Resolve admin panel save problems');
		$this->_prefix = ''; // short name (as short as possible)
		$this->_pprefix = 'ipresta'; // keep it ipresta
	}

	public function install(){
		if (!parent::install()
			||	!$this->registerHook($this->getHooks())
			||	!$this->installConfigs()
		)
			return false;
		else
			return true;
	}
	public function uninstall(){
		if (!parent::uninstall()
			||	!$this->uninstallHooks()
			||	!$this->uninstallConfigs()
		)
			return false;
		return true;
	}

	public function getHooks()
	{
		return array(
		'displayBackOfficeHeader',
		);
	}

	public function getConfigs()
	{
		return array(
		);
	}
	
	
	
	public function hookDisplayBackofficeHeader()
	{
		$this->context->controller->addJS($this->_path.'js/admin.js');
	}


	/* #########################  DON'T EDIT AFTER THIS LINE  ######################### */
	/* #########################      Default Functions       ######################### */

	// load a php file by name
	public function load($class,$path = null)
	{
		if (is_null($path))
			$path = $this->getLocalPath()."classes/";
		$filename = $path . $class .".php";
		if ( Tools::file_exists_cache($filename))
		{
			include_once $filename;
		}
	}

	
	
	public function uninstallHooks()
	{
		$return = true;
		$hooks = $this->getHooks();
		if(is_array($hooks) && count($hooks) > 0)
			foreach ($hooks as $hook)
				$return &= $this->unregisterHook($hook);
		elseif (!empty($hooks))
			$return &= $this->unregisterHook($hooks);
		return $return;
	}

	public function installConfigs()
	{
		$return = true;
		$configs = $this->getConfigs();
		if(is_array($configs) && count($configs) > 0)
			foreach ($configs as $config => $value)
				$return &= Configuration::updateValue($this->configName($config),$value);
		return $return;
	}
	


	public function uninstallConfigs()
	{
		$return = true;
		$configs = $this->getConfigs();
		if(is_array($configs) && count($configs) > 0)
			foreach ($configs as $config)
				$return &= Configuration::deleteByName($this->configName($config));
		return $return;
	}
	
	
	/* ######################### Default Functions End ######################### */
}