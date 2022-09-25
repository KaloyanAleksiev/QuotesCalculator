<template>
    <div v-if="showing" @click.self="showing = false" class="fixed w-full h-full flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div>
            <div class="bg-white bg-clip-padding rounded-md">
                <div class="p-4 border-b border-gray-200">
                    <h5 class="text-center text-3xl font-extrabold font-['Raleway'] leading-7">
                        Results
                    </h5>
                </div>
                <div class="p-3">
                    <slot/>
                </div>
                <div class="flex justify-center p-3">
                    <button type="button" @click="showing = false"
                            class="flex-no-shrink text-white py-2 px-4 rounded bg-[#fb3d37] font-extrabold font-['Raleway']">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Results",
    props: {
        showing: {
            required: true,
            type: Boolean
        }
    }
}
</script>

<style scoped>

</style>
