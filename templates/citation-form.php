<div class="cg-wrapper" style="max-width:800px;margin:30px auto;">
    <form id="cg-form">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;">
            <div class="cg-form-group">
                <label class="cg-label">Author(s) *</label>
                <input type="text" id="cg-author" class="cg-input" required>
            </div>
            <div class="cg-form-group">
                <label class="cg-label">Title *</label>
                <input type="text" id="cg-title" class="cg-input" required>
            </div>
            <div class="cg-form-group">
                <label class="cg-label">Year *</label>
                <input type="number" id="cg-year" class="cg-input" required>
            </div>
            <div class="cg-form-group">
                <label class="cg-label">URL</label>
                <input type="url" id="cg-url" class="cg-input">
            </div>
        </div>
        <button type="submit" class="cg-btn" style="width:auto;padding:12px 30px;">⚡ Generate</button>
    </form>
    
    <div class="cg-tabs" style="margin-top:20px;">
        <?php foreach(['apa','mla','chicago','ieee','harvard','bibtex'] as $f): ?>
        <button class="cg-tab <?= $f==='apa'?'active':''?>" data-format="<?=$f?>"><?=strtoupper($f)?></button>
        <?php endforeach; ?>
    </div>
    
    <div class="cg-output" style="margin-top:20px;">
        <div id="cg-output" class="cg-citation-text empty">...</div>
    </div>
</div>
