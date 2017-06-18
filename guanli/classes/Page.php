<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/10 0010
 * Time: 12:40
 */
//This script defines the Page class

/* Class Page.
 * The class contains six attributes:id,creatorld,title,content,dateAdded,and dateUpdated.
 * The attributes match the corresponding database columns.
 * The class contains seven methods:
 * -getId()
 * -getCreatorld()
 * -getTitle()
 * -getContent()
 * -getDateAdded()
 * -getDateUpdated()
 * -getlntro
 */
class Page{

    //All attributes correspond to database columns.
    //All attributes are protected.
    protected $id=null;
    protected $creatorld=null;
    protected $title=null;
    protected $content=null;
    protected $dateAdded=null;
    protected $dateUpdated=null;

    //No need for a constructor!

    //Six methods for returning attribute values;
    function getId(){
        return $this->id;
    }
    function getCreatorld(){
        return $this->creatorld;
    }
    function getTitle(){
        return $this->title;
    }
    function getContent(){
        return $this->content;
    }
    function getDateAdded(){
        return $this->dateAdded;
    }
    function getDateUpdated(){
        return $this->dateUpdated;
    }

    //Method returns the first X characters from the content:
    function getIntro($count=200){
        return substr(strip_tags($this->content),0,$count).'...';
    }

}//End of Page class.

