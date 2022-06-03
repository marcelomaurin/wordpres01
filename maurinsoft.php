<?php
/*
Plugin Name: Maurinsoft
Plugin URL: http://maurinsoft.com.br/plugin/
Description: Plugin de Acesso a camera
Version: 1.0
Author: Marcelo Maurin Martins
Author URI: http://maurinsoft.com.br
Text Domain: maurinsoft
License: GPLv3
*/

/*Classe maurinsoft  -  Esta classe eh single instance , ou seja somente pode ser criada uma vez*/
class Maurinsoft{
	private static $instance; /*Pega a instancia da classe*/
	
	public static function getInstance(){
			if(self::$instance==NULL){
				self::$instance = new self(); /*caso nao exista cria uma instancia*/
			}
	}
	
	private function __construct(){ /*construtor da classe*/
			/** Add action do word press **/
			add_action('init',array($this,'maurinsoft_inicializa')); /* Ao inicializar */
			add_action('wp_footer',array($this,'maurinsoft_rodape')); /*informação adicional do rodape*/
			//remove_action('','');
			add_action('admin_enqueue_scrips',array($this,'add_css')); /*Registra o CSS especifico */
			
	}
	
	function add_css(){
		wp_register_style('maurinsoft',plugin_dir_url(__FILE__).'css/maurinsoft.css');
		wp_enqueue_style('maurinsoft');
	}
	
	function maurinsoft_aboutus(){
		echo "Maurinsoft 1.0";
	}

	function maurinsoft_rodape(){
		echo "<a href='http://maurinsoft.com.br'>maurinsoft.com.br</a> ";
	}

	function maurinsoft_inicializa(){
		if (is_user_logged_in()){
			//echo 'Logado!';
			} else {
			//echo 'Nao logado';	
			}
	}
	
}  //Fim da classe

Maurinsoft::getInstance(); //Inicializa metodo construtor



