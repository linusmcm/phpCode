<?php
/********************************************************************************
* @ File: dynbarchart.php
* @ Original date: February 2003 @ www16.brinkster.com/gazb/ming/
* @ Version: 1.2
* @ Summary: dynamic loading of data from text files every 5 seconds
* @ Updated:  small improvements and summary text
* @ Copyright (c) 2003-2007, www.gazbming.com - all rights reserved.
* @ Author: gazb.ming [[@]] gmail.com - www.gazbming.com 
* @ Released under GNU Lesser General Public License - http://www.gnu.org/licenses/lgpl.html
********************************************************************************/

/*
data in external text files...
vars0.txt=var1=10&var2=20&var3=30&var4=40&var5=50&loaded=1
vars1.txt=var1=90&var2=80&var3=70&var4=80&var5=10&loaded=1
vars1.txt=var1=60&var2=50&var3=40&var4=20&var5=50&loaded=1
*/

// some typical movie variables
//Ming_setScale(20.0000000);
ming_useswfversion(6);
$movie = new SWFMovie();
$movie->setDimension(550,400);
$movie->setBackground(rand(0,0xFF),rand(0,0xFF),rand(0,0xFF));
$movie->setRate(31); 

$strAction = "
// make bar
createEmptyMovieClip('bar', 1);
with(bar){
beginFill(255, 90); moveTo(0, 0); lineTo(0, -100); lineTo(40, -100);
lineTo(40, 0); lineTo(0, 0); endFill(); _x=-500; _y=-500;
}

// duplicate bar
for(i=1;i<6;i++) {
bar.duplicateMovieClip('bar'+i,100+i);
with(_root['bar'+i]){
_y=110; _x=110+i*42;
_yscale=0;
}
var col=new Color(_root['bar'+i]);
col.setRGB(random(0x666666));
};

// make textfield
createTextField('mytext',2,10,10,360,100);
with (mytext){ 
multiline = true; wordWrap = true; border = true;
text='loading data every fifteen seconds.....';
type = 'dynamic';
}

// make textformat
myformat = new TextFormat();
myformat.color = 0x006600;
myformat.size = 14;
myformat.font = '_sans';
myformat.bold = false;
mytext.setTextFormat(myformat);

// make bars rescale
onEnterFrame=function() {
for(i=1;i<6;i++) {
var disty=lv['var'+i]-this['bar'+i]._yscale;
var movey=disty/5;
this['bar'+i]._yscale+=movey;
}};

// make loadVars
lv = new LoadVars();
lv.onLoad = function(success) {
if(success) {
mytext.text='loaded= ' + success;
for(i=1;i<6;i++) { mytext.text+='\n this.var'+i+'=' + this['var'+i]; }
mytext.setTextFormat(myformat);  // hack
}else { mytext.text='failed'; }
};

// make callback
callback = function()  {
counter=++counter%3;
lv.load('vars'+counter+'.txt');
};
counter=0;
lv.load('vars'+counter+'.txt');

// set callback
intervalID = setInterval( callback, 5000 ); 
";
$movie->add(new SWFAction($strAction));

// save swf with same name as filename
$swfname = basename(__FILE__,".php");
$movie->save("$swfname.swf",9);
?>