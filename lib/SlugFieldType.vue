<template>
    <input @keyup="onKeyUp"/>
</template>
<script>
import slugify from '@sindresorhus/slugify';
import {createEventListener} from '@anomaly/streams-platform';

export default {
    props: {
        slugify      : {
            type    : String,
            required: true
        },
        lowercase    : Boolean,
        alwaysSlugify: Boolean,
        type         : {
            type   : String,
            default: '_'
        }
    },

    /**
     *
     * @return {{target: HTMLElement}}
     */
    data() {
        return {
            target: null
        };
    },
    created() {
        this.onTargetUpdate = (event) => {
            this.$el.value = slugify(event.target.value, {lowercase: this.lowercase, separator: this.type});
        };
    },
    mounted() {
        console.log('mounted slug', {me: this, props: this.$props});
        this.target = document.querySelector(`[data-field="${this.slugify}"]`);
        this.unbindListener = createEventListener(this.target, 'keyup', event => this.onTargetUpdate(event));
    },
    beforeDestroy() {
        this.unbindListener();
    },
    methods: {
        onKeyUp(event) {
            if ( !this.alwaysSlugify ) {
                this.unbindListener();
            }
        }
    }
};
</script>