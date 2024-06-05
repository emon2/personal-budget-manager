<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

  defineProps({
    categories: Object    
  })
</script>

<template>    
    <Head title="Category" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Category</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="relative overflow-x-auto">
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        <th scope="col" class="px-6 py-3">
            Name
        </th>
        <th scope="col" class="px-6 py-3">
            Type
        </th>        
    </tr>
    </thead>
    <tbody>
    <tr v-for="(category, index) in categories" :key="index"
        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                   {{category.name}}
                </th>
                <td class="px-6 py-4">
{{category.type}}                </td>
        </tr>
    </tbody>
</table>
</div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>    
</template>