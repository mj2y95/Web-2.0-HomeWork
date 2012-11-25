"use strict";
var nowCnt = 0;
var deltaTime;
var nowCnt;
var strArr;
var timer;

function animationSelected() {
	var select = document.getElementById('select');
	var text = document.getElementById('displayarea');
	if (select.value == "Custom")
	{
		text.value = "   o\n" + 
					"- ||-\n" + 
					"  o o\n" + 
					"=====\n" + 
					" \\o/\n" + 
					"  ||\n" + 
					" o o\n" + 
					"=====\n" + 
					"   o\n" + 
					" /||\\\n" + 
					"  o o\n";
	}
	else
	{
		text.value = ANIMATIONS[select.value];
	}
}

function radioSelected() {
	var radio = document.getElementsByName("SizeRadio");
	var text = document.getElementById('displayarea');
	for (var i = 0; i < radio.length; i++) {
		if(radio[i].checked)
		{
			if (i == 0)
			{
				text.style.fontSize = '7pt';
			}
				
			if (i == 1)
			{
				text.style.fontSize = '12pt';
			}
				
			if (i == 2)
			{
				text.style.fontSize = '24pt';
			}
				
		}
	}
}

function stopBtnClick() {
	clearTimeout(timer);
	animationSelected();
}

function play() {
	var text = document.getElementById('displayarea');
	text.value = strArr[nowCnt];
	nowCnt++;
	if (nowCnt == strArr.length)
	{
		nowCnt = 0;
	}
	
	timer = setTimeout(play,deltaTime);
}

function playBtnClick() {
	var select = document.getElementById('select');
	var text = document.getElementById('displayarea');
	if (select.value != 'Blank')
	{
		strArr = text.value.split("=====\n");
		nowCnt = 0;
		var turbo = document.getElementsByName('Speed');
		if (turbo[0].checked)
		{
			deltaTime = 50;
		}
		else
		{
			deltaTime = 200;
		}
		play();
	}
}

function turbo()
{
	var turbo = document.getElementsByName('Speed');
	if (turbo[0].checked)
	{
		deltaTime = 50;
	}
	else
	{
		deltaTime = 200;
	}
}