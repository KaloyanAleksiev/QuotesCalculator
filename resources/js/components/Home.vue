<template>
    <nav-bar></nav-bar>
    <div class="flex flex-col">
        <div class="m-auto pt-5">
            <a href="/">
                <img :src="'/images/logo.svg'" width="200" alt="SGT auto transport logo">
            </a>
        </div>

        <div class="m-auto mt-24 py-10 px-12 bg-white rounded-md drop-shadow-2xl">
            <div class="text-center text-3xl font-extrabold font-['Raleway'] leading-7">
                <div>
                    Get a Free
                </div>
                <div class="text-[#fb3d37]">
                    Instant Quote
                </div>
            </div>
            <div class="grid grid-cols-1 mt-8 group">
                <label class="uppercase text-xs font-semibold group-focus-within:text-[#252cbe]">Ship from</label>
                <input
                    class="from py-2 px-3 rounded border-2 mt-1 min-h-[52px] min-w-[345px] focus:shadow-md focus:shadow-[#252cbe]/50 focus:outline-none focus:ring-2 focus:ring-[#252cbe]/50 focus:border-transparent italic"
                    type="text" placeholder="ZIP Code"/>
            </div>
            <div class="grid grid-cols-1 mt-4 group">
                <label class="uppercase text-xs font-semibold group-focus-within:text-[#252cbe]">Deliver to</label>
                <input
                    class="to py-2 px-3 rounded border-2 mt-1 min-h-[52px] min-w-[345px] focus:shadow-md focus:shadow-[#252cbe]/50 focus:outline-none focus:ring-2 focus:ring-[#252cbe]/50 focus:border-transparent italic"
                    type="text" placeholder="ZIP Code"/>
            </div>
            <div class="grid grid-cols-1 mt-5">
                <label class="uppercase text-xs font-semibold">Transport method</label>
                <div class="flex flex-wrap mt-2 text-gray-400 text-lg">
                    <div class="flex items-center mr-4">
                        <input checked id="open-transport" type="radio" value="open-transport" name="transport[]"
                               class="w-5 h-5 accent-[#252cbe] peer">
                        <label for="open-transport" class="ml-1 font-semibold peer-checked:text-black">Open</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input id="close-transport" type="radio" value="close-transport" name="transport[]"
                               class="w-5 h-5 accent-[#252cbe] peer">
                        <label for="close-transport" class="ml-1 font-semibold peer-checked:text-black">Enclosed</label>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 mt-5">
                <button type="button" id="getAQuoteButton" name="button"
                        class="bg-[#fb3d37] text-white py-3 rounded text-center uppercase text-xl font-extrabold font-['Raleway']">Get a quote
                </button>
            </div>
        </div>
        <router-view/>
    </div>
</template>

<script>
import NavBar from "./layouts/NavBar"

export default {
    components: {NavBar},
}
</script>
