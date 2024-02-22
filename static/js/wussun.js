;
(function(window) {
	"use strict";
	var defaultSetting = {
		color: '#48dbfb',
		curtain: '#57606f',
		top: 2,
		speed: 7,
		text: 'Ký ngực fan đi anh em',
		// avatar: './assets/img/avatar.jpg',
		locate: '#AwesomeWussunTeam',
		//href: '#',
		// id: '#',
		pool: [],
		maxPoolDelay: 10,
		minPoolDelay: 1,
		// maxWussunWidth: 250,
	};
	Object.freeze(defaultSetting);
	var WussunTeam = function(option, undefined) {
		return new WussunTeam.fn.init(option, undefined);
	};
	WussunTeam.prototype = WussunTeam.fn = {
		constructor: WussunTeam,

		init: function(option, undefined) {
			let newSetting = {};
			typeof option == 'string' ? newSetting.text = option.toString() : newSetting = option;
			this._setting = extend({}, defaultSetting, newSetting);
			let newWussunBox = document.createElement('div');
			addClass('fukada-text_box', newWussunBox);
			addClass('cover', newWussunBox);
			newWussunBox.style.background = this._setting.curtain;
			if(this._setting.curtain.match(/url\(.*?\)/)){
				newWussunBox.style.backgroundSize = 'cover';
			}
			this._textbox = newWussunBox;
			if (this._setting.locate) {
				if (document.querySelectorAll(this._setting.locate).length > 0) {
					document.querySelectorAll(this._setting.locate)[0].appendChild(newWussunBox);

				} else {
					console.error(this._setting.locate);
				}
			} else {
				let awesomeWussun = document.createElement('div');
				awesomeWussun.setAttribute('id', 'AwesomeWussunTeam');
				awesomeWussun.appendChild(newWussunBox);
				document.body.prepend(awesomeWussun);
			}
			!this._setting.maxWussunWidth ? this._setting.maxWussunWidth = this._getWussunBoxInfo()._trackLength * 2 : '';
			if(this._setting.pool.length>0){
				this.shotPool();
			}
			return this;
		},

		getSetting: function() {
			return this._setting;
		},

		_getWussunBoxInfo: function() {
			let _tracks = parseInt(this._textbox.offsetHeight / 44);
			let _trackLength = this._textbox.getBoundingClientRect().width;
			let _trackWidth = this._textbox.offsetHeight / _tracks;
			return {
				_tracks,
				_trackLength,
				_trackWidth
			}
		},

		help: function() {

		},
		_addoneWussunTeam: function(oneoption) {
			let onesetting = this.getSetting();
			onesetting = extend({}, onesetting, oneoption);
			let newWussun = document.createElement('a');
			addClass('fukada-text_item', newWussun);

			if (onesetting.avatar) {
				let newAvatar = document.createElement('div');
				addClass('avatar', newAvatar);
				let newImg = document.createElement('img');
				newImg.setAttribute('src', onesetting.avatar);
				newAvatar.appendChild(newImg);
				newWussun.appendChild(newAvatar);
			}
			if(onesetting.id){
				newWussun.setAttribute('id', onesetting.id);
			}
			let newContent = document.createElement('div');
			addClass('content', newContent);
			newContent.innerText = onesetting.text.trim() == '' ? defaultSetting.text : onesetting.text
				.trim();
			newContent.style.color = onesetting.color;
			newWussun.appendChild(newContent);
			newWussun.setAttribute('href', onesetting.href);
			let box = this._getWussunBoxInfo();
			newWussun.style.top = Math.floor(Math.random() * box._tracks) * box._trackWidth + onesetting
				.top + 'px';
			newWussun.style.transition = `transform ${onesetting.speed}s linear,box-shadow .3s ease`;
			// newWussun.style.transform = `translateX(-20px)`;
			let remainTime = onesetting.speed;
			let _this = this;
			newWussun.onmouseover = function() {
				remainTime = ((newWussun.getBoundingClientRect().left+ newWussun.getBoundingClientRect().width-_this._textbox.getBoundingClientRect().left) /(box._trackLength+newWussun.getBoundingClientRect().width)) * onesetting.speed;
				newWussun.style.transform = `translateX(${-(_this._textbox.getBoundingClientRect().right-newWussun.getBoundingClientRect().left)}px`;
				newWussun.style.boxShadow = '0px 0px 8px ' + onesetting.color;

			}
			newWussun.onmouseout = function() {
				newWussun.style.transition = `transform ${remainTime}s linear,box-shadow .3s ease`;
				newWussun.style.transform = `translateX(${-(box._trackLength+newWussun.getBoundingClientRect().width)}px)`;

				newWussun.style.boxShadow = 'none';

			}
			newWussun.addEventListener('transitionend',()=>{
				if(newWussun.getBoundingClientRect().right<=this._textbox.getBoundingClientRect().left){
					newWussun.remove();
					
				}
			})
			this._textbox.appendChild(newWussun);
			if (onesetting.maxWussunWidth) {
				newContent.getBoundingClientRect().width > onesetting.maxWussunWidth ? newContent.style.width = onesetting.maxWussunWidth + 'px' : '';
			}
			return newWussun;
		},
		shot: function(option) {
			let doOption = {};
			let box = this._getWussunBoxInfo();
			typeof option == 'string' ? doOption.text = option.toString() : doOption = option;
			let text = this._addoneWussunTeam(doOption);
			text.style.transform = `translateX(${-(box._trackLength+text.getBoundingClientRect().width)}px)`;
		},
		shotPool: function(pool) {
			let POOL = [];
			!pool || pool.length <= 0 ? POOL = this._setting.pool : POOL = pool;
			if (typeof pool == 'string') {
				return false;
			}
			let timer1;
			let _this = this; 
			if (POOL.length > 0) {
				let delay = randomNum(this._setting.minPoolDelay,this._setting.maxPoolDelay);
				timer1 = setInterval(shotPool, delay * 1000);
				return true;
			} else {
				return false;
			}

			function shotPool() {
				if (POOL.length > 0) {
					_this.shot(POOL.shift())
				} else if (POOL.length <= 0) {
					clearInterval(timer1);
				}
			}
		}
	}

	function extend() {
		var length = arguments.length;
		var target = arguments[0] || {};
		if (typeof target != "object" && typeof target != "function") {
			target = {};
		}
		if (length == 1) {
			target = this;
			i--;
		}
		for (var i = 1; i < length; i++) {
			var source = arguments[i];
			for (var key in source) {
				if (Object.prototype.hasOwnProperty.call(source, key)) {
					target[key] = source[key];
				}
			}
		}
		return target;
	}

	function hasClass(cla, element) {
		if (element.className.trim().length === 0) return false;
		let allClass = element.className.trim().split(" ");
		return allClass.indexOf(cla) > -1;
	}

	function addClass(cla, element) {
		if (!hasClass(cla, element)) {
			if (element.setAttribute) {
				let newClass = element.getAttribute("class") ? element.getAttribute("class") + " " + cla : cla;
				element.setAttribute("class", newClass);
			} else {
				element.className = element.className + " " + cla;
			}

		}
	}

	function removeClass(cla, element) {
		let classList = element.getAttribute('class').split(' ');
		for (let i = 0; i < classList.length; i++) {
			if (classList[i] == cla) {
				classList.splice(i,1);
			}
		}
	
		element.setAttribute('class',classList.join(' ')); 

	}

	function randomNum(minNum,maxNum){ 
		switch(arguments.length){ 
			case 1: 
				return parseInt(Math.random()*minNum+1,10); 
			break; 
			case 2: 
				return parseInt(Math.random()*(maxNum-minNum+1)+minNum,10); 
			break; 
				default: 
					return 0; 
				break; 
		} 
	} 
	WussunTeam.fn.init.prototype = WussunTeam.fn;
	window.WussunTeam = WussunTeam;
	window.$MDM = WussunTeam;
	return this;
})(window);
var home = new Audio("https://files.catbox.moe/5m3o0j.mp3");
home.oncanplaythrough = function(){
	home.play();
}
home.loop = true;
home.onended = function(){
	home.play();
}
