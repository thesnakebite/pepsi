<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-tabs> <a17-tab name="Contenido" :selected="true"> <a17-repeater type="column_item" :name="repeaterName('Columna')" ></a17-repeater> </a17-tab> <a17-tab name="Estilos"> <a17-colorfield label="Color fondo" :name="fieldName('bg_color')" in-store="value"
></a17-colorfield> <a17-tabs> <a17-tab name="Por defecto" :selected="true"> <a17-inputframe label="Imagen Fondo por defecto" name="medias.image_bg_default" > <a17-mediafield :name="fieldName('image_bg_default')" crop-context="image_bg_default" :width-min="0" :height-min="0" :with-video-url="false" > </a17-mediafield> </a17-inputframe> </a17-tab> <a17-tab name="Móvil"> <a17-inputframe label="Imagen Fondo móvil" name="medias.image_bg_mobile" > <a17-mediafield :name="fieldName('image_bg_mobile')" crop-context="image_bg_mobile" :width-min="0" :height-min="0" > </a17-mediafield> </a17-inputframe> </a17-tab> </a17-tabs> </a17-tab> <a17-tab name="Avanzado"> <a17-textfield label="Label" :name="fieldName('label_block')" type="text" :maxlength="100" in-store="value" ></a17-textfield> <a17-singleselect label="Tipo de fila" :name="fieldName('type')" :options="[{&quot;value&quot;:&quot;standard&quot;,&quot;label&quot;:&quot;Standard&quot;},{&quot;value&quot;:&quot;full-boxed&quot;,&quot;label&quot;:&quot;Full boxed&quot;},{&quot;value&quot;:&quot;full-width&quot;,&quot;label&quot;:&quot;Full width&quot;}]" selected="standard" :grid="false" :columns="0" :inline="true" :has-default-store="true" in-store="value"
> </a17-singleselect> <div class="wrapper"> <div class="col--double col--double-wrap"> <a17-textfield label="ID" :name="fieldName('html_id')" type="text" :maxlength="250" in-store="value" ></a17-textfield> </div> <div class="col--double col--double-wrap"> <a17-textfield label="Class" :name="fieldName('html_class')" type="text" :maxlength="500" in-store="value" ></a17-textfield> </div> </div> </a17-tab></a17-tabs>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
