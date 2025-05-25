<footer id="footer" class="bg-white text-center py-3 border-top border-1 border-light-subtle">
    <p class="mb-0">&copy; 2025 Twitter dos Cria. Inspirado no <span class="text-primary"><i class="bi bi-twitter"></i>
            Twitter</span>.</p>
</footer>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const footer = document.getElementById("footer");
    const documentHeight = document.documentElement.scrollHeight;
    const windowHeight = window.innerHeight;
    if (documentHeight <= windowHeight) {
        footer.classList.add("fixed-bottom");
    } else {
        footer.classList.remove("fixed-bottom");
    }
});
</script>
</body>

</html>