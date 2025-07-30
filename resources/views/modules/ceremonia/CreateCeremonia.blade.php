<div class="modal fade" id="modalNuevaCeremonia" tabindex="-1" aria-labelledby="modalNuevaCeremoniaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="#" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNuevaCeremoniaLabel">Registrar Nueva Misa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="fec_ceremonia" class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="fec_ceremonia" required>
                    </div>
                    <div class="mb-3">
                        <label for="observacion" class="form-label">Observación</label>
                        <input type="text" class="form-control" name="observacion">
                    </div>
                </div> {{-- cierre correcto del modal-body --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
