<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    arts: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Главная</h2>
            <Link :href="route('createArt')" class="ml-auto">
                <PrimaryButton>
                    Создать
                </PrimaryButton>
            </Link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-if="arts.length > 0" class="w-full grid grid-cols-4">
                    <div class="cursor-pointer bg-gray-100 rounded-lg" v-for="art in arts" :key="art.id">
                        <img :src="art.url" :alt="art.title">
                        <span class="">{{ art.title }}</span>
                    </div>
                </div>
                <div v-else>Нет изображений!</div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
