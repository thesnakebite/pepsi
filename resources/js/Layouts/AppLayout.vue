<template>
    <div class="app-layout">
        <Header />

        <main>
            <slot></slot>
        </main>
        
        <Footer />
    </div>
</template>

<script>
    import Header from '@/Components/Header'
    import Footer from '@/Components/Footer'

    export default {
        components: {
            Header,
            Footer
        }
    }
</script>