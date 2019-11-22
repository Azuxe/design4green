<?php
return array(
	"siteUrl"=>"http://51.83.40.255/",
	"database"=>array(
			"type"=>"mysql",
			"dbName"=>"designforgreen",
			"serverName"=>"127.0.0.1",
			"port"=>3306,
			"user"=>"newuser",
			"password"=>"password",
			"options"=>array(),
			"cache"=>false,
			"wrapper"=>"Ubiquity\\db\\providers\\pdo\\PDOWrapper"
			),
	"sessionName"=>"s5dd54943eebf4",
	"namespaces"=>array(),
	"templateEngine"=>"Ubiquity\\views\\engine\\Twig",
	"templateEngineOptions"=>array(
			"cache"=>false
			),
	"test"=>false,
	"debug"=>true,
	"logger"=>function (){return new \Ubiquity\log\libraries\UMonolog("Design4Green",\Monolog\Logger::INFO);},
	// "di"=>array(
	// 		"@exec"=>array("jquery"=>function ($controller){
	// 					return \Ubiquity\core\Framework::diSemantic($controller);
	// 				})
	// 		),
	"cache"=>array(
			"directory"=>"cache/",
			"system"=>"Ubiquity\\cache\\system\\ArrayCache",
			"params"=>array()
			),
	"mvcNS"=>array(
			"models"=>"models",
			"controllers"=>"controllers",
			"rest"=>""
			),
	"isRest"=>function (){
			return \Ubiquity\utils\http\URequest::getUrlParts()[0]==="rest";
		}
	);
