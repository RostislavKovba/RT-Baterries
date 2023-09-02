// import axios from 'axios';
import * as smoothScroll from './smoothScroll';
import * as select from './niceSelect';
import * as functions from './functions';
import * as sectionDetector from './sectionDetector';
import * as cursor from './cursor';
import * as canvas from './canvas';
import * as sliders from './sliders';
import * as constructor from './constructor';
import * as menu from './menu';
import * as movingSvg from './movingSvg';


window.addEventListener('load', () => {

  // const loadScript = (source, beforeEl, async = true, defer = true) => {
  //   return new Promise((resolve, reject) => {
  //     let script = document.createElement('script');
  //     const prior = beforeEl || document.getElementsByTagName('script')[0];
  
  //     script.async = async;
  //     script.defer = defer;
  
  //     function onloadHander(_, isAbort) {
  //       if (isAbort || !script.readyState || /loaded|complete/.test(script.readyState)) {
  //         script.onload = null;
  //         script.onreadystatechange = null;
  //         script = undefined;
  
  //         if (isAbort) { reject(); } else { resolve(); }
  //       }
  //     }
  
  //     script.onload = onloadHander;
  //     script.onreadystatechange = onloadHander;
  
  //     script.src = source;
  //     prior.parentNode.insertBefore(script, prior);
  //   });
  // }

  // loadScript('https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js').then(() => {
  //   functions.animationScroll(html.querySelectorAll('.scroll-section'));
  // }, () => {
  //   console.log('fail to load script');
  // });

  // const api = 'http://www.colr.org/json/color/random';
  // const body = document.querySelector('body');

  // function randomColor() {
  //   axios.get('https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js').then(res => {
  //     console.log(res, 'res')
  //   }).catch(() => console.error('Random color could not be fetched.'));
  // }

  // randomColor();

});