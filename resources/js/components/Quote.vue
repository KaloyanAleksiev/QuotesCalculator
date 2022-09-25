<template>
    <div class="flex flex-col">
        <nav-bar></nav-bar>
        <div class="m-auto pt-5">
            <a href="/">
                <img :src="'/images/logo.svg'" width="200" alt="SGT auto transport logo">
            </a>
        </div>
        <form class="m-auto mt-24 py-10 px-12 bg-white rounded-md drop-shadow-2xl" @submit.prevent="getQuote">
            <div class="text-center text-3xl font-extrabold font-['Raleway'] leading-7">
                <div>Get a Free</div>
                <div class="text-[#fb3d37]">Instant Quote</div>
            </div>
            <div class="grid grid-cols-1 mt-8 group">
                <label class="uppercase text-xs font-semibold group-focus-within:text-[#252cbe]">Ship from</label>
                <input type="text" placeholder="ZIP Code" v-model="form.ship_from" required
                       class="from py-2 px-3 rounded border-2 mt-1 min-h-[52px] min-w-[345px] focus:shadow-md focus:shadow-[#252cbe]/50 focus:outline-none focus:ring-2 focus:ring-[#252cbe]/50 focus:border-transparent italic"/>
                <span class="w-full text-red-500" v-if="errors.ship_from">{{errors.ship_from[0]}}</span>
            </div>
            <div class="grid grid-cols-1 mt-4 group">
                <label class="uppercase text-xs font-semibold group-focus-within:text-[#252cbe]">Deliver to</label>
                <input type="text" placeholder="ZIP Code" v-model="form.deliver_to" required
                       class="to py-2 px-3 rounded border-2 mt-1 min-h-[52px] min-w-[345px] focus:shadow-md focus:shadow-[#252cbe]/50 focus:outline-none focus:ring-2 focus:ring-[#252cbe]/50 focus:border-transparent italic"/>
                <span class="w-full text-red-500" v-if="errors.deliver_to">{{errors.deliver_to[0]}}</span>
            </div>
            <div class="grid grid-cols-1 mt-5">
                <label class="uppercase text-xs font-semibold">Transport method</label>
                <div class="flex flex-wrap mt-2 text-gray-400 text-lg">
                    <div class="flex items-center mr-4">
                        <input id="openTransport" type="radio" v-model="form.transport" value="0" checked
                               class="w-5 h-5 accent-[#252cbe] peer">
                        <label for="openTransport" class="ml-1 font-semibold peer-checked:text-black">Open</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input id="closeTransport" type="radio" v-model="form.transport" value="1"
                               class="w-5 h-5 accent-[#252cbe] peer">
                        <label for="closeTransport" class="ml-1 font-semibold peer-checked:text-black">Enclosed</label>
                    </div>
                </div>
                <span class="w-full text-red-500" v-if="errors.transport">{{errors.transport[0]}}</span>
            </div>
            <div class="grid grid-cols-1 mt-5">
                <button type="submit" :disabled="disabled"
                        class="bg-[#fb3d37] text-white py-3 rounded text-center uppercase text-xl font-extrabold font-['Raleway'] disabled:opacity-75">
                    Get a quote
                </button>
            </div>
        </form>
        <router-view/>
        <results :showing="showResults">
            <p v-if="this.results.enclosed !== '0' && this.results.enclosed !== '0.00'">
                Enclosed: {{ this.results.enclosed }}
            </p>
            <p v-if="this.results.rate !== '0.00'">
                Rate: {{ this.results.rate }}
            </p>
            <p v-else>
                Incorrect Input!
                Please double check your ZIP codes!
            </p>
        </results>
    </div>
</template>

<script>
import NavBar from "./layouts/NavBar"
import Results from "./Results";

export default {
    components: {Results, NavBar},
    data() {
        return {
            form: {
                ship_from: '',
                deliver_to: '',
                transport: '0',
            },
            disabled: false,
            showResults: false,
            results: '',
            errors: []
        }
    },
    methods: {
        getQuote() {
            this.errors = [];
            this.disabled = true;
            this.showResults = false;
            axios.post('/api/quote', this.form).then((response) => {
                this.results = response.data;
                this.showResults = true;
                this.disabled = false;
            }).catch((error) => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
                this.disabled = false;
            })
        }
    }
}
</script>
