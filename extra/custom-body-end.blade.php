{{-- Arcade: score, 8-bit sound and the Konami code. Options are in config.php. --}}

<script>
(function () {
  // Flags from config.php
  var cfg = {
    sfx: {{ theme('enable_sfx') != "false" ? 'true' : 'false' }},
    konami: {{ theme('enable_konami') != "false" ? 'true' : 'false' }}
  };

  var scoreEl = document.getElementById('arcade-score');
  var hiEl = document.getElementById('arcade-hiscore');
  var toastEl = document.getElementById('arcade-toast');
  var score = 0;
  var hi = 0;
  var audio = null;
  var toastTimer = null;

  try { hi = parseInt(localStorage.getItem('arcade-hiscore'), 10) || 0; } catch (e) {}

  function pad(n) { return ('000000' + n).slice(-6); }

  function render() {
    if (scoreEl) scoreEl.textContent = pad(score);
    if (hiEl) hiEl.textContent = pad(hi);
  }

  function addPoints(n, x, y) {
    score += n;
    if (score > hi) {
      hi = score;
      try { localStorage.setItem('arcade-hiscore', String(hi)); } catch (e) {}
    }
    render();
    if (x === undefined || !scoreEl) return;
    var pop = document.createElement('div');
    pop.className = 'arcade-points';
    pop.textContent = '+' + n;
    pop.style.left = x + 'px';
    pop.style.top = y + 'px';
    document.body.appendChild(pop);
    setTimeout(function () { pop.remove(); }, 900);
  }

  // Short square-wave notes, like an 8-bit console
  function play(notes, length) {
    if (!cfg.sfx) return;
    try {
      var Ctx = window.AudioContext || window.webkitAudioContext;
      if (!Ctx) return;
      audio = audio || new Ctx();
      if (audio.state === 'suspended') audio.resume();
      var t = audio.currentTime;
      notes.forEach(function (freq, i) {
        var osc = audio.createOscillator();
        var gain = audio.createGain();
        osc.type = 'square';
        osc.frequency.value = freq;
        gain.gain.setValueAtTime(0.04, t + i * length);
        gain.gain.exponentialRampToValueAtTime(0.0001, t + (i + 1) * length);
        osc.connect(gain);
        gain.connect(audio.destination);
        osc.start(t + i * length);
        osc.stop(t + (i + 1) * length);
      });
    } catch (e) {}
  }

  function toast(text) {
    if (!toastEl) return;
    toastEl.textContent = text;
    toastEl.classList.remove('is-visible');
    void toastEl.offsetWidth;
    toastEl.classList.add('is-visible');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(function () { toastEl.classList.remove('is-visible'); }, 2200);
  }

  // +100 and a blip for every link
  document.addEventListener('click', function (e) {
    var button = e.target.closest ? e.target.closest('.button') : null;
    if (!button) return;
    var r = button.getBoundingClientRect();
    addPoints(100, r.left + r.width / 2, r.top - 6);
    play([880, 1320], 0.07);
  });

  // Up Up Down Down Left Right Left Right B A
  if (cfg.konami) {
    var code = 'arrowup,arrowup,arrowdown,arrowdown,arrowleft,arrowright,arrowleft,arrowright,b,a';
    var keys = [];
    document.addEventListener('keydown', function (e) {
      keys.push((e.key || '').toLowerCase());
      keys = keys.slice(-10);
      if (keys.join(',') !== code) return;
      keys = [];
      var on = document.body.classList.toggle('arcade-turbo');
      if (on) {
        toast('CHEAT ACTIVATED\nTURBO MODE');
        addPoints(3000);
        play([523, 659, 784, 1047], 0.09);
      } else {
        toast('TURBO MODE OFF');
        play([784, 523], 0.09);
      }
    });
  }

  render();
})();
</script>
