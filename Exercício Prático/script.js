<script>
function confirmarExclusao(id) {
    if (confirm("Excluir este contato?")) {
        location.href = "excluir.php?id=" + id;
    }
}
</script>
