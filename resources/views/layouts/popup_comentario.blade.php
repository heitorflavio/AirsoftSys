<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/comentario/jogos/{{$jogo->id}}" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Comentário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <select name="tipo_id" id="tipo_id" class="form-control">
                            <option value="1">Positivo</option>
                            <option value="2">Crítica</option>
                            <option value="3">Denúncia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comentario">Comentário</label>
                        <textarea name="comentario" id="comentario" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="tipo" id="tipo">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    @if($jogo->status)
                    <button type="submit" class="btn btn-success">Adicionar</button>
                    @else
                    <button type="submit" class="btn btn-success" disabled>Adicionar</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const tipoSelect = document.getElementById("tipo_id");
    const tipoHidden = document.getElementById("tipo");

    function updateTipoHidden() {
        const selectedOption = tipoSelect.options[tipoSelect.selectedIndex];
        tipoHidden.value = selectedOption.text;
    }

    tipoSelect.addEventListener("change", updateTipoHidden);
    updateTipoHidden(); // Atualiza o valor do input hidden assim que a página é carregada
});
</script>

