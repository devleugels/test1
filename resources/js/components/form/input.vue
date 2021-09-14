<template>
    <div class="block full-width">
        <div class="flex items-center">
            <formlabel :labeltekst="label" />
            <input class="w-full px-3" type="text"
                   :name="veldnaam" :id="veldnaam"
                   :value="modelValue"
                   @input="$emit('update:modelValue', $event.target.value)"
                    />
        </div>

        <div class="full-width"> 
            <formerror />
        </div>

    </div>
</template>

<script>
export default{
	props: [ 'label', 'veldnaam', 'modelValue'],
    emits: ['update.modelValue'],

	
	data(){
		return {
            // 
		}
	},
		
    computed: {
        value : {
            get() {
                return this.modelValue
            },
            set ( value ) {
                this.$emit('update.modelValue', value)
            }
        }

    },

	methods:{ 

	},
}

/**
   props: {
    modelValue: String // previously was `value: String`
  },
  emits: ['update:modelValue'],
  methods: {
    changePageTitle(title) {
      this.$emit('update:modelValue', title) // previously was `this.$emit('input', title)`
    }
  }

 */
</script>
