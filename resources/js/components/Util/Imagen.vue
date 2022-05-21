<template>
  <div
    v-cargarImagen="{
      src: this.src,
      width: this.width,
      height: this.height,
    }"
    class="bg-img"
  />
</template>

<script>
export default {
  name: "utilImg",
  computed: {
    imageSrc() {
      return "@/../images/" + this.src;
    },
  },
  props: {
    src: String,
    width: {
      type: String,
      default: "",
    },
    height: {
      type: String,
      default: "",
    },
  },
  directives: {
    cargarImagen: {
      mounted: function (el, binding) {
        if (binding.value.width != "") {
          el.style.width = binding.value.width;
        }
        if (binding.value.height != "") {
          el.style.height = binding.value.height;
        }

        $(el)
          .prepend(`<div class="loaderContainer" style="position:absolute;width:${binding.value.width}"><div class="imagePlaceholder">Cargando
                    <span></span>
                  </div></div>`);

        let imagePreloader = new Image();
        imagePreloader.src = "@/../images/" + binding.value.src;

        imagePreloader.onload = function () {
          el.style.backgroundImage = `url(${imagePreloader.src})`;

          el.style.width =
            binding.value.width == "" ? `${this.width}px` : binding.value.width;
          el.style.height =
            binding.value.height == ""
              ? `${this.height}px`
              : binding.value.height;

          el.removeChild(el.lastElementChild);
        };
      },
    },
  },
  created() {
    this.isLoading = true;
  },
  data() {
    return {
      isLoaded: true,
      isLoading: false,
    };
  },
};
</script>
<style lang="sass">
.loaderContainer
  position: absolute
  top: 50%

.bg-img
  background: $navBackground

.imagePlaceholder
  position: absolute
  top: 50%
  left: 50%
  transform: translate(-50%, -50%)
  width: 150px
  height: 150px
  background: transparent
  border: 3px solid $secondaryColor
  border-radius: 50%
  text-align: center
  line-height: 150px
  font-family: sans-serif
  font-size: 20px
  color: $primaryColor
  letter-spacing: 4px
  text-transform: uppercase
  text-shadow: 0 0 10px $primaryColorLighter
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.5)

  &:before
    content: ''
    position: absolute
    top: -3px
    left: -3px
    width: 100%
    height: 100%
    border: 3px solid transparent
    border-top: 3px solid $primaryColor
    border-right: 3px solid $primaryColor
    border-radius: 50%
    animation: animateC 2s linear infinite

.imagePlaceholder span
  display: block
  position: absolute
  top: calc(50% - 2px)
  left: 50%
  width: 50%
  height: 4px
  background: transparent
  transform-origin: left
  animation: animate 2s linear infinite

  &:before
    content: ''
    position: absolute
    width: 16px
    height: 16px
    border-radius: 50%
    background: $navButtonBackgroundDarker
    top: -6px
    right: -8px
    box-shadow: 0 0 20px $navButtonBackgroundDarker

@keyframes animateC
  0%
    transform: rotate(0deg)
  100%
    transform: rotate(360deg)

@keyframes animate
  0%
    transform: rotate(45deg)
  100%
    transform: rotate(405deg)
</style>