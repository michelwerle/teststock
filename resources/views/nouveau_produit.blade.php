<div id="nouveau_produit" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouveau produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nom">Nom<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="description">Description<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="prix">Prix<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="prix" name="prix">
                </div>
                <div class="form-group">
                    <label for="quantite">Quantité<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="quantite" name="quantite">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
