<?php
/*
Template Name: Citation Generator
Description: Full-page citation generator with Yelp-style UI
*/

get_header();
?>

<div class="cg-wrapper" style="font-family:-apple-system,BlinkMacSystemFont,sans-serif;max-width:1200px;margin:40px auto;padding:0 20px;">

    <!-- Hero Section -->
    <div style="background:linear-gradient(135deg,#d32323,#b71c1c);color:white;padding:60px 40px;border-radius:16px;text-align:center;margin-bottom:40px;">
        <div style="font-size:4rem;margin-bottom:20px;">📚</div>
        <h1 style="font-size:3rem;margin-bottom:15px;">Citation Generator</h1>
        <p style="font-size:1.2rem;opacity:0.95;max-width:700px;margin:0 auto;line-height:1.6;">
            Generate professional citations instantly for your research papers, blogs, and academic work.
        </p>
    </div>

    <!-- Main Grid -->
    <div style="display:grid;grid-template-columns:320px 1fr;gap:35px;align-items:start;">
        
        <!-- Form Sidebar -->
        <aside style="background:white;padding:35px;border-radius:12px;box-shadow:0 4px 16px rgba(0,0,0,0.12);position:sticky;top:30px;height:fit-content;">
            <h2 style="margin-bottom:28px;color:#d32323;border-bottom:3px solid #d32323;padding-bottom:18px;font-size:1.6rem;">✏️ Enter Source Details</h2>
            
            <form id="cg-form" onsubmit="event.preventDefault();generateCitation();">
                <div style="margin-bottom:24px;">
                    <label style="display:block;font-weight:600;margin-bottom:9px;color:#333;font-size:14px;">Author(s) <span style="color:#d32323">*</span></label>
                    <input type="text" id="cg-author" placeholder="e.g., Smith, J." required style="width:100%;padding:13px 17px;border:2px solid #e6e6e6;border-radius:8px;font-size:14px;font-family:inherit;" />
                </div>

                <div style="margin-bottom:24px;">
                    <label style="display:block;font-weight:600;margin-bottom:9px;color:#333;font-size:14px;">Title <span style="color:#d32323">*</span></label>
                    <input type="text" id="cg-title" placeholder="e.g., Article Title" required style="width:100%;padding:13px 17px;border:2px solid #e6e6e6;border-radius:8px;font-size:14px;font-family:inherit;" />
                </div>

                <div style="margin-bottom:24px;">
                    <label style="display:block;font-weight:600;margin-bottom:9px;color:#333;font-size:14px;">Year <span style="color:#d32323">*</span></label>
                    <input type="number" id="cg-year" placeholder="2024" required min="1900" max="<?php echo date('Y'); ?>" style="width:100%;padding:13px 17px;border:2px solid #e6e6e6;border-radius:8px;font-size:14px;font-family:inherit;" />
                </div>

                <div style="margin-bottom:24px;">
                    <label style="display:block;font-weight:600;margin-bottom:9px;color:#333;font-size:14px;">URL (optional)</label>
                    <input type="url" id="cg-url" placeholder="https://example.com/article" style="width:100%;padding:13px 17px;border:2px solid #e6e6e6;border-radius:8px;font-size:14px;font-family:inherit;" />
                </div>

                <button type="submit" style="width:100%;background:linear-gradient(135deg,#d32323,#b71c1c);color:white;border:none;padding:16px 32px;border-radius:8px;cursor:pointer;font-weight:700;font-size:16px;letter-spacing:.5px;box-shadow:0 5px 20px rgba(211,35,35,.35);transition:all .3s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">⚡ Generate Citation</button>
            </form>
            
            <p style="margin-top:20px;font-size:13px;color:#999;line-height:1.5;">
                💡 Press <kbd style="background:#f0f0f0;padding:2px 6px;border-radius:3px;font-size:12px;">Ctrl+Enter</kbd> to generate quickly!
            </p>
        </aside>

        <!-- Output Area -->
        <main>
            <!-- Format Tabs -->
            <nav style="background:white;padding:22px 28px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,.08);display:flex;gap:11px;flex-wrap:wrap;margin-bottom:28px;">
                <strong style="font-weight:700;color:#666;margin-right:12px;font-size:14px;text-transform:uppercase;letter-spacing:.8px;">FORMAT:</strong>
                
                <button onclick="setFormat('apa',this)" class="cg-tab active" style="padding:11px 24px;background:#d32323;color:white;border:2px solid #d32323;border-radius:28px;cursor:pointer;font-weight:600;font-size:14px;">APA 7th</button>
                <button onclick="setFormat('mla',this)" class="cg-tab" style="padding:11px 24px;background:transparent;border:2px solid #e6e6e6;border-radius:28px;cursor:pointer;font-weight:600;font-size:14px;color:#666;">MLA 9th</button>
                <button onclick="setFormat('chicago',this)" class="cg-tab" style="padding:11px 24px;background:transparent;border:2px solid #e6e6e6;border-radius:28px;cursor:pointer;font-weight:600;font-size:14px;color:#666;">Chicago</button>
                <button onclick="setFormat('ieee',this)" class="cg-tab" style="padding:11px 24px;background:transparent;border:2px solid #e6e6e6;border-radius:28px;cursor:pointer;font-weight:600;font-size:14px;color:#666;">IEEE</button>
                <button onclick="setFormat('harvard',this)" class="cg-tab" style="padding:11px 24px;background:transparent;border:2px solid #e6e6e6;border-radius:28px;cursor:pointer;font-weight:600;font-size:14px;color:#666;">Harvard</button>
                <button onclick="setFormat('bibtex',this)" class="cg-tab" style="padding:11px 24px;background:transparent;border:2px solid #e6e6e6;border-radius:28px;cursor:pointer;font-weight:600;font-size:14px;color:#666;">BibTeX</button>
            </nav>

            <!-- Output Card -->
            <article style="background:white;border-radius:12px;overflow:hidden;box-shadow:0 4px 16px rgba(0,0,0,.12);">
                <header style="background:linear-gradient(135deg,#f8f9fa,#e9ecef);padding:22px 28px;display:flex;justify-content:space-between;align-items:center;border-bottom:2px solid #e6e6e6;flex-wrap:wrap;gap:15px;">
                    <h3 style="margin:0;font-size:1.35rem;font-weight:700;color:#333;display:flex;align-items:center;gap:12px;">📋 Generated Citation</h3>
                    <button onclick="copyCitation()" style="background:#d32323;color:white;border:none;padding:12px 26px;border-radius:8px;cursor:pointer;font-weight:600;font-size:13px;box-shadow:0 3px 10px rgba(211,35,35,.3);white-space:nowrap;">📋 Copy to Clipboard</button>
                </header>
                
                <div style="padding:35px 28px;">
                    <div id="cg-output" style="background:#f8f9ff;border-left:5px solid #d32323;padding:28px;border-radius:0 8px 8px 0;font-size:15px;line-height:1.85;color:#333;font-style:italic;min-height:90px;">
                        Fill in the form and click "Generate Citation" to see your formatted citation here...
                    </div>
                    
                    <aside id="cg-metadata" style="display:none;background:linear-gradient(135deg,#fff9e6,#fffbf0);border-left:5px solid #ffa726;padding:24px 28px;margin-top:22px;border-radius:0 8px 8px 0;">
                        <h4 style="font-weight:700;color:#e65100;margin-bottom:18px;font-size:1.05rem;text-transform:uppercase;letter-spacing:.5px;">📊 Source Metadata</h4>
                        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;font-size:14px;">
                            <div><strong style="display:block;color:#666;font-size:12px;text-transform:uppercase;letter-spacing:.6px;margin-bottom:5px;">Author(s)</strong><span id="meta-author" style="color:#333;font-weight:500;">-</span></div>
                            <div><strong style="display:block;color:#666;font-size:12px;text-transform:uppercase;letter-spacing:.6px;margin-bottom:5px;">Title</strong><span id="meta-title" style="color:#333;font-weight:500;">-</span></div>
                            <div><strong style="display:block;color:#666;font-size:12px;text-transform:uppercase;letter-spacing:.6px;margin-bottom:5px;">Year</strong><span id="meta-year" style="color:#333;font-weight:500;">-</span></div>
                            <div><strong style="display:block;color:#666;font-size:12px;text-transform:uppercase;letter-spacing:.6px;margin-bottom:5px;">URL</strong><span id="meta-url" style="color:#333;font-weight:500;">-</span></div>
                        </div>
                    </aside>
                </div>
            </article>
        </main>
    </div>

    <!-- Features Section -->
    <section style="margin-top:55px;">
        <h2 style="text-align:center;font-size:2.2rem;font-weight:800;color:#333;margin-bottom:38px;position:relative;padding-bottom:18px;">Why Use Our Citation Generator?</h2>
        
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(290px,1fr));gap:28px;">
            <article style="background:white;padding:35px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,.08);text-align:center;position:relative;overflow:hidden;">
                <div style="position:absolute;top:0;left:0;width:100%;height:4px;background:linear-gradient(90deg,#d32323,#f4c150);"></div>
                <div style="font-size:3.5rem;margin-bottom:18px;">⚡</div>
                <h3 style="color:#d32323;margin-bottom:14px;font-size:1.35rem;font-weight:700;">Instant Results</h3>
                <p style="color:#666;line-height:1.7;font-size:14px;">Generate properly formatted citations in milliseconds.</p>
            </article>

            <article style="background:white;padding:35px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,.08);text-align:center;position:relative;overflow:hidden;">
                <div style="position:absolute;top:0;left:0;width:100%;height:4px;background:linear-gradient(90deg,#d32323,#f4c150);"></div>
                <div style="font-size:3.5rem;margin-bottom:18px;">🌐</div>
                <h3 style="color:#d32323;margin-bottom:14px;font-size:1.35rem;font-weight:700;">Multiple Formats</h3>
                <p style="color:#666;line-height:1.7;font-size:14px;">Support for all major citation styles worldwide.</p>
            </article>

            <article style="background:white;padding:35px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,.08);text-align:center;position:relative;overflow:hidden;">
                <div style="position:absolute;top:0;left:0;width:100%;height:4px;background:linear-gradient(90deg,#d32323,#f4c150);"></div>
                <div style="font-size:3.5rem;margin-bottom:18px;">💾</div>
                <h3 style="color:#d32323;margin-bottom:14px;font-size:1.35rem;font-weight:700;">Easy Copy-Paste</h3>
                <p style="color:#666;line-height:1.7;font-size:14px;">One-click copy to clipboard functionality.</p>
            </article>
        </div>
    </section>

</div>

<!-- Toast Notification -->
<div id="cg-toast" style="position:fixed;bottom:35px;right:35px;background:#2d3436;color:white;padding:18px 30px;border-radius:8px;font-size:14px;font-weight:500;box-shadow:0 10px 35px rgba(0,0,0,.3);opacity:0;visibility:hidden;transform:translateY(30px);transition:all .4s cubic-bezier(.4,0,.2,1);z-index:99999;display:flex;align-items:center;gap:12px;"></div>

<script>
let currentFormat = 'apa';

function setFormat(format, btn) {
    currentFormat = format;
    
    // Update button styles
    document.querySelectorAll('.cg-tab').forEach(tab => {
        tab.style.background = 'transparent';
        tab.style.color = '#666';
        tab.style.borderColor = '#e6e6e6';
    });
    
    btn.style.background = '#d32323';
    btn.style.color = 'white';
    btn.style.borderColor = '#d32323';
    
    // Regenerate if data exists
    if(document.getElementById('cg-output').dataset.citation) {
        generateCitation();
    }
}

function generateCitation() {
    const author = document.getElementById('cg-author').value.trim();
    const title = document.getElementById('cg-title').value.trim();
    const year = document.getElementById('cg-year').value.trim();
    const url = document.getElementById('cg-url').value.trim();
    
    // Validation
    if(!author || !title || !year) {
        showToast('⚠️ Please fill all required fields (*)', 'warning');
        return;
    }
    
    let citation = '';
    
    switch(currentFormat) {
        case 'apa':
            citation = `${author}. (${year}). <em>${title}</em>.${url ? ' Retrieved from '+url : ''}`;
            break;
        case 'mla':
            const accessDate = new Date().toLocaleDateString('en-US',{year:'numeric',month:'long',day:'numeric'});
            citation = `${author}. "${title}." ${year}. Web. ${accessDate}.`;
            break;
        case 'chicago':
            citation = `${author}. "${title}." ${year}.${url ? ' '+url:''}`;
            break;
        case 'ieee':
            citation = `${author.split(',')[0]}, "${title}," ${year}.${url?' [Online]. Available: '+url:''}`;
            break;
        case 'harvard':
            const accDate = new Date().toLocaleDateString('en-US',{year:'numeric',month:'long',day:'numeric'});
            citation = `${author} (${year}) '${title},'${url?' Available at: '+url+' (Accessed: '+accDate+').':''}`;
            break;
        case 'bibtex':
            const citeKey = title.replace(/[^\w\s]/g,'').split(/\s+/).slice(0,3).join('').toLowerCase()+year;
            citation = `@article{${citeKey},\n  author = {${author}},\n  title = {${title}},\n  year = {${year}}\n}`;
            break;
        default:
            citation = `${author}. (${year}). ${title}.`;
    }
    
    // Display citation
    const output = document.getElementById('cg-output');
    output.innerHTML = citation;
    output.dataset.citation = JSON.stringify({author,title,year,url});
    
    // Show metadata
    document.getElementById('cg-metadata').style.display = 'block';
    document.getElementById('meta-author').textContent = author;
    document.getElementById('meta-title').textContent = title;
    document.getElementById('meta-year').textContent = year;
    document.getElementById('meta-url').textContent = url || '-';
    
    // Success message
    showToast('✅ Citation generated successfully!', 'success');
}

function copyCitation() {
    const text = document.getElementById('cg-output').innerText;
    
    if(text.includes('Fill in the form')) {
        showToast('⚠️ No citation to copy yet!', 'warning');
        return;
    }
    
    navigator.clipboard.writeText(text).then(() => {
        showToast('📋 Citation copied to clipboard!', 'success');
    }).catch(() => {
        // Fallback
        const ta = document.createElement('textarea');
        ta.value = text;
        document.body.appendChild(ta);
        ta.select();
        document.execCommand('copy');
        document.body.removeChild(ta);
        showToast('📋 Copied!', 'success');
    });
}

function showToast(message, type='') {
    const toast = document.getElementById('cg-toast');
    toast.innerHTML = message;
    toast.className = 'show';
    if(type === 'success') toast.style.background = 'linear-gradient(135deg,#00b894,#55efc4)';
    else if(type === 'warning') toast.style.background = 'linear-gradient(135deg,#e17055,#fab1a0)';
    else toast.style.background = '#2d3436';
    
    setTimeout(() => {
        toast.classList.remove('show');
        toast.style.opacity = '0';
        toast.style.visibility = 'hidden';
    }, 3500);
}
</script>

<?php get_footer(); ?>
