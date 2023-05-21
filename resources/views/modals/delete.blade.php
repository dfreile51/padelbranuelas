<div id="myModal" class="modal hidden">
    <div class="modal-content">
        <div class="modal-header">
            <span class="material-symbols-outlined close">
                close
            </span>
            <h3></h3>
        </div>
        <div class="modal-body">
            <span></span>
        </div>
        <div class="modal-footer">
            <form id="modal-form" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="botones btn-eliminar">
            </form>
        </div>
    </div>
</div>
