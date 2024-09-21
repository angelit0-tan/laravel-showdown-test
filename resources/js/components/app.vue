<template>
    <table class="border-collapse w-full text-sm dark:bg-slate-800">
        <thead>
            <tr>
                <th class="border-b dark:border-slate-600 font-medium p-2 pl-8 text-slate-400 dark:text-slate-200 text-left"></th>
                <th class="border-b dark:border-slate-600 font-medium p-2 pl-8 text-slate-400 dark:text-slate-200 text-left">Name</th>
                <th class="border-b dark:border-slate-600 font-medium p-2 text-slate-400 dark:text-slate-200 text-left">Firstname</th>
                <th class="border-b dark:border-slate-600 font-medium p-2 pr-8 text-slate-400 dark:text-slate-200 text-left">Lastname</th>
                <th class="border-b dark:border-slate-600 font-medium p-2 pr-8 text-slate-400 dark:text-slate-200 text-left">Email</th>
                <th class="border-b dark:border-slate-600 font-medium p-2 pr-8 text-slate-400 dark:text-slate-200 text-left">Timezone</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-slate-800">
            <tr v-for="user in users" :key="user.id">
                <td class="border-b border-slate-100 dark:border-slate-700 p-1 text-slate-500 dark:text-slate-400">
                    <input type="checkbox" v-model="user.is_selected"/>
                </td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-1 pl-8 text-slate-500 dark:text-slate-400">
                    {{ user.name }}
                </td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-1 text-slate-500 dark:text-slate-400">
                    {{ user.first_name }}
                </td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-1 pr-8 text-slate-500 dark:text-slate-400">
                    {{ user.last_name }}
                </td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-1 pr-8 text-slate-500 dark:text-slate-400">
                    {{ user.email }}
                </td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-1 pr-8 text-slate-500 dark:text-slate-400">
                    {{ user.time_zone }}
                </td>
            </tr>
        </tbody>
  </table>
  <div contenteditable="true">
    {{  batch }}
  </div>
</template>
<script setup>
    import axios from 'axios';
    import { nextTick, onMounted, ref, watch } from 'vue';

    const users = ref([]);
    const batch = ref([]);

    // Watch for any user changes, when checkbox is clicked
    watch(users, (value) => {
        batch.value = [];
        nextTick(() => {
            value.filter((i) => i.is_selected).forEach((v) => {
                batch.value.push({
                    name: v.name,
                    first_name: v.first_name,
                    last_name: v.last_name,
                });
            })
            batch.value = JSON.stringify(batch.value);
        })
 
    }, {
        deep: true
    });

    // on mounted load the api users
    onMounted(async() => {
        const { data : { data } } = await axios.get('/api/users');
        users.value = data;
        console.log(users)
    })

</script>