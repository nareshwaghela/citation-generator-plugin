<?php
/*
Template Name: Citation Generator
*/
get_header(); 
?>

<div class="cg-wrapper">
    <div class="cg-hero">
        <h1>📚 Citation Generator</h1>
        <p>Generate professional citations in APA, MLA, Chicago, IEEE, Harvard & more!</p>
    </div>
    
    <div class="cg-grid">
        <aside class="cg-sidebar">
            <h2 style="margin-bottom:20px;color:#d32323;">✏️ Enter Details</h2>
            <form id="cg-form">
                <div class="cg-form-group">
                    <label class="cg-label">Author(s) *</label>
                    <input type="text" id="cg-author" class="cg-input" placeholder="e.g., Smith, J." required>
                </div>
                <div class="cg-form-group">
                    <label class="cg-label">Title *</label>
                    <input type="text" id="cg-title" class="cg-input" placeholder="e.g., Article Title" required>
                </div>
                <div class="cg-form-group">
                    <label class="cg-label">Year *</label>
                    <input type="number" id="cg-year" class="cg-input" placeholder="2024" required>
                </div>
                <div class="cg-form-group">
                    <label class="cg-label">URL</label>
                    <input type="url" id="cg-url" class="cg-input" placeholder="https://...">
                </div>
                <button type="submit" class="cg-btn">⚡ Generate</button>
            </form>
        </aside>
        
        <main>
            <div class="cg-tabs">
                <span style="font-weight:600;color:#666;">Format:</span>
                <button class="cg-tab active" data-format="apa">APA</button>
                <button class="cg-tab" data-format="mla">MLA</button>
                <button class="cg-tab" data-format="chicago">Chicago</button>
                <button class="cg-tab" data-format="ieee">IEEE</button>
                <button class="cg-tab" data-format="harvard">Harvard</button>
                <button class="cg-tab" data-format="bibtex">BibTeX</button>
            </div>
            
            <div class="cg-output">
                <h3 style="margin-bottom:15px;">📋 Generated Citation</h3>
                <div id="cg-output" class="cg-citation-text empty">Fill the form and click Generate...</div>
                <button onclick="copyCitation()" style="margin-top:15px;padding:10px 24px;background:#28a745;color:white;border:none;border-radius:6px;cursor:pointer;font-weight:600;">📋 Copy to Clipboard</button>
            </div>
        </main>
    </div>
</div>

<script>
function copyCitation(){
    const text = document.getElementById('cg-output').innerText;
    navigator.clipboard.writeText(text).then(() => alert('✅ Copied!'));
}
</script>

<?php get_footer(); ?>
