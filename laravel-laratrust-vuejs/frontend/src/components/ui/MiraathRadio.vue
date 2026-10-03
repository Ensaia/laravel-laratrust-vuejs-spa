<template>
    <div class="card">
      <div class="card-body"></div>
      <div class="card-footer d-flex justify-content-around">
          <div>
              <button @click="togglePlay" class="btn btn-dark">
                  <span>{{ isPlaying ? 'إيقاف' : 'تشغيل' }}</span>
                  <span class="m-1"><font-awesome-icon :icon="['fas','play']" /></span>
              </button>
          </div>
<!--          <div>-->
<!--              <button @click="stopTrack" class="btn btn-dark">-->
<!--                  <span>إيقاف</span>-->
<!--                  <span class="m-1"><font-awesome-icon :icon="['fas','pause']" /></span>-->

<!--              </button>-->
<!--          </div>-->
          <div>
              <button class="btn btn-dark">
                  <span>volume up</span>
                  <span class="m-1"><font-awesome-icon :icon="['fas','volume-high']" /></span>
              </button>
          </div>
          <div>
              <button class="btn btn-dark">
                  <span>volume down</span>
                  <span class="m-1"><font-awesome-icon :icon="['fas','volume-down']" /></span>
              </button>
          </div>
          <div>
              <button class="btn btn-dark">
                  <span>mute</span>
                  <span class="m-1"><font-awesome-icon :icon="['fas','volume-mute']" /></span>
              </button>
          </div>
<!--          <div class="pt-2">-->
<!--              <input-->
<!--                      type="range"-->
<!--                      min="0"-->
<!--                      max="1"-->
<!--                      step="0.1"-->
<!--                      v-model="volume"-->
<!--                      @input="updateVolume"-->
<!--              />-->
<!--          </div>-->
      </div>
    </div>
</template>

<script setup>
    import { ref, onMounted, onUnmounted } from 'vue';
    import { Howl } from 'howler';
    import axios from 'axios'

    const currentDatetime = new Date().getTime()
    console.log(currentDatetime)
    const payload = { rsys: "scv26", port: "8010", NoCache: currentDatetime }
    axios
        .post("https://radio.al7eah.net/cp/widgets/player/single/nowplay.php",payload,
            {
                headers:{
                    'Access-Control-Allow-Origin' : '*',
                    'origin' : 'https://radio.al7eah.net'
                }
            }
            )
        .then((response) => {
            console.log(response);
        })
        .catch((error) => {
            console.error(error);
        })
        .finally(() => {
            console.log("Request completed");
        });

    const isPlaying = ref(false);
    const volume = ref(0.8);
    let sound = null; // Plain variable avoids reactivity issues

    onMounted(() => {
        sound = new Howl({
            // src: ['https://c14.radioboss.fm:8384/stream'],
            src: ['https://radio.hhost.host/8010/stream'],
            html5: true, // Force HTML5 Audio to pool large files and avoid CORS issues
            volume: volume.value,
            onplay: () => { isPlaying.value = true; },
            onpause: () => { isPlaying.value = false; },
            onstop: () => { isPlaying.value = false; },
            onend: () => { isPlaying.value = false; }
        });
    });

    const togglePlay = () => {
        if (!sound) return;
        sound.playing() ? sound.pause() : sound.play();
    };

    const stopTrack = () => {
        if (sound) sound.stop();
    };

    const updateVolume = () => {
        if (sound) sound.volume(volume.value);
    };

    // Clean up memory when component unmounts
    onUnmounted(() => {
        if (sound) sound.unload();
    });
</script>
