<template>
    <transition name="fade">
        <div v-if="toast && visible" class="v-toast v-toast--top">
            <div role="alert" class="v-toast__item v-toast__item--success v-toast__item--top-right" style="">
                <div class="v-toast__icon"></div>
                <p class="v-toast__text">{{ toast.message }}</p>
            </div>
        </div>
    </transition>
</template>
<script>


export default {
    props: [
        'toast',
    ],
    data() {
        return {
            visible:false
        }
    },
    watch: {
        toast: {
            deep: true,
            handler() {
                this.visible = true
                setTimeout(() => this.visible = false, 3000)
            }
        }
    }
}
</script>
