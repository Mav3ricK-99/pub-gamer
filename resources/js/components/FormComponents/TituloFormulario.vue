<template>
  <div class="d-flex justify-content-center">
    <hr class="w-25" size="4" /><span class="dot"></span>
    <h4 class="tituloForm"><slot/></h4>
    <span class="dot"></span><hr class="w-25" size="4"/>
  </div>
</template>

<style scope lang="sass">
.tituloForm
    color: $colorNav
    font-family: Lato
    margin-left: 1rem
    margin-right: 1rem

hr
    color: $colorNav
    align-self: center
    opacity: .55

.dot 
  height: 12px
  width: 12px
  background-color: white
  border-radius: 50%
  align-self: center

</style>