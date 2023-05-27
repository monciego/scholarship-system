<script setup>
let time = new Date().getFullYear();
</script>

<template>
    <div class="fixed inset-x-0 bottom-0 h-11 bg-yellow-400"></div>
    <footer class="fixed inset-x-0 bottom-0 h-10 bg-blue-700 text-white w-full">
        <div class="text-center my-2">
            &copy;
            <span id="copyright">
                {{ time }}
                {{ " " }}
            </span>
            Pangasinan State University
        </div>
    </footer>
</template>
