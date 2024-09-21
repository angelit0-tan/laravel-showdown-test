<template>
    <div class="container m-auto">
        <table class="border-collapse w-full text-sm dark:bg-slate-800 my-5">
            <thead>
                <tr>
                    <th class="border-b dark:border-slate-600 font-medium p-2 text-slate-400 dark:text-slate-200 text-left"></th>
                    <th class="border-b dark:border-slate-600 font-medium p-2 text-slate-400 dark:text-slate-200 text-left">Name</th>
                    <th class="border-b dark:border-slate-600 font-medium p-2-slate-400 dark:text-slate-200 text-left">Firstname</th>
                    <th class="border-b dark:border-slate-600 font-medium p-2 text-slate-400 dark:text-slate-200 text-left">Lastname</th>
                    <th class="border-b dark:border-slate-600 font-medium p-2 text-slate-400 dark:text-slate-200 text-left">Email</th>
                    <th class="border-b dark:border-slate-600 font-medium p-2 text-slate-400 dark:text-slate-200 text-left">Timezone</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-800">
                <tr v-for="user in users" :key="user.id">
                    <td class="border-b dark:border-slate-700 p-1">
                        <input type="checkbox" :id="user.id" v-model="user.is_selected"/>
                    </td>
                    <td class="border-b dark:border-slate-700 dark:text-slate-400">
                       <label :for="user.id"> {{ user.name }} </label>
                    </td>
                    <td class="border-b dark:border-slate-700 dark:text-slate-400">
                        <label :for="user.id"> {{ user.first_name }} </label>
                    </td>
                    <td class="border-b dark:border-slate-700 dark:text-slate-400">
                        <label :for="user.id"> {{ user.last_name }} </label>
                    </td>
                    <td class="border-b dark:border-slate-700 dark:text-slate-400">
                        <label :for="user.id"> {{ user.email }} </label>
                    </td>
                    <td class="border-b dark:border-slate-700 dark:text-slate-400">
                        <label :for="user.id"> {{ user.time_zone }} </label>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="my-7 border p-3">
            <h1 class="text-2xl font-bold"> Batch Process</h1>
            <span>Select the checkbox in the above table and optionally edit the name, firstname, lastname and timezone in the <b>below json requests</b> data to update the user data.</span>
            <div class="mt-3"><strong>JSON requests:</strong></div>
            <div class="my-3">
                <textarea rows="6" style="width: 100%;" v-model="batchRequests"/>
            </div>
            <hr class="my-5"/>
            <div class="flex gap-3 items-center">
                <select 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    v-model="batchRequestPer">
                    <option selected value="0">Select number of request(s)</option>
                    <option v-for="item in 60" :key="item"> {{  item }}</option>
                </select>
                <button type="button" :disabled="isBusy" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" @click="batchUpdateProcess">Batch Update</button>
                <div v-if="batchRequestTotalProcess" class="text-lg font-bold text-green-500">
                    Total process: {{ batchRequestTotalProcess }}
                </div>
            </div>
        </div>
        
        <div class="my-7 border p-3">
            <h1 class="text-2xl font-bold"> Individual Process</h1>
            <span>Select the checkbox in the above table and optionally edit the name, firstname, lastname and timezone in the <b>below json requests</b> data to update the user data.</span>
            <div class="mt-3"><strong>JSON requests:</strong></div>
            <div class="my-3">
                <textarea rows="6" style="width: 100%;" v-model="individualRequests"/>
            </div>
            <hr class="my-5"/>
            <div class="flex gap-3 items-center">
                <select 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/6 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    v-model="individualRequestPer">
                    <option selected value="0">Select number of request(s)</option>
                    <option v-for="item in 3610" :key="item"> {{  item }}</option>
                </select>
                <button type="button" :disabled="isBusy" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" @click="individualUpdateProcess">Individual Update</button>
                <div v-if="individualRequestTotalProcess" class="text-lg font-bold text-green-500">
                    Total process: {{ individualRequestTotalProcess }}
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
    import axios from 'axios';
    import { nextTick, onMounted, ref, watch } from 'vue';

    const users = ref([]);
    const batchRequests = ref([]);
    const individualRequests = ref([]);
    const batchRequestPer = ref(0);
    const individualRequestPer = ref(0);
    const batchRequestTotalProcess = ref(0);
    const individualRequestTotalProcess = ref(0);
    const isBusy = ref(false);
    
    // Batch update process
    async function batchUpdateProcess() {
        // Loop thru the selected number of request
        isBusy.value = true;
        for (let i = 1; i <= batchRequestPer.value; i++) {
            try{
                await axios.post('/api/batch', JSON.parse(batchRequests.value));
                batchRequestTotalProcess.value++;
            }catch(e) {
                alert(e?.response?.data?.message)
                isBusy.value = false;
                return;
            }
        }
        isBusy.value = false;
    }

    // Individual update process
    async function individualUpdateProcess() {
        // Loop thru the selected number of request
        isBusy.value = true;
        const parseIndividual = JSON.parse(individualRequests.value); // part the request
        const resultObj = Object.assign({}, ...parseIndividual); // convert to be single object
        for (let i = 1; i <= individualRequestPer.value; i++) {
            try{
                await axios.post('/api/individual', resultObj);
                individualRequestTotalProcess.value++;
            }catch(e) {
                alert(e?.response?.data?.message)
                isBusy.value = false;
                return;
            }
        }
        isBusy.value = false;
    }

    // load users
    async function loadUsers() {
        const { data : { data } } = await axios.get('/api/users');
        users.value = data;
    }

    // Watch for any user changes, when checkbox is clicked
    watch(users, (value) => {
        batchRequests.value = [];
        nextTick(() => {
            value.filter((i) => i.is_selected).forEach((v) => {
                batchRequests.value.push({
                    email: v.email,
                    name: v.name,
                    first_name: v.first_name,
                    last_name: v.last_name,
                    time_zone: v.time_zone
                });
            })
            batchRequests.value = JSON.stringify(batchRequests.value); // batch request

            // get only the first data for individual
            individualRequests.value = JSON.stringify(JSON.parse(batchRequests.value).splice(0,1));
        })
 
    }, {
        deep: true
    });

    // on mounted load the api users
    onMounted(async() => {
        await loadUsers();
    })

</script>