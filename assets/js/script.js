document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('cg-form');
    const output = document.getElementById('cg-output');
    const tabs = document.querySelectorAll('.cg-tab');
    let currentFormat = 'apa';
    
    tabs.forEach(tab => tab.addEventListener('click', function() {
        tabs.forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        currentFormat = this.dataset.format;
        if(form.dataset.citation) generate(currentFormat);
    }));
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const data = {
            author: document.getElementById('cg-author').value,
            title: document.getElementById('cg-title').value,
            year: document.getElementById('cg-year').value,
            url: document.getElementById('cg-url').value || ''
        };
        
        if(!data.author || !data.title || !data.year){
            alert('Please fill required fields!');
            return;
        }
        
        form.dataset.citation = JSON.stringify(data);
        generate(currentFormat);
    });
    
    function generate(format) {
        const data = JSON.parse(form.dataset.citation);
        let cite = '';
        
        switch(format) {
            case 'apa': cite = `${data.author}. (${data.year}). <em>${data.title}</em>.${data.url ? ' Retrieved from '+data.url : ''}`; break;
            case 'mla': cite = `${data.author}. "${data.title}." ${data.year}. Web.`; break;
            case 'chicago': cite = `${data.author}. "${data.title}." ${data.year}.${data.url ? ' '+data.url:''}`; break;
            case 'ieee': cite = `${data.author.split(',')[0]}, "${title}," ${data.year}.${data.url?' [Online]. Available: '+data.url:''}`; break;
            case 'harvard': cite = `${data.author} (${data.year}) '${data.title},'${data.url?' Available at: '+data.url:''}`; break;
            case 'bibtex': cite = `@article{${data.title.replace(/\s/g,'').substring(0,10)},\n  author={${data.author}},\n  title={${data.title}},\n  year={${data.year}}\n}`; break;
            default: cite = `${data.author}. (${data.year}). ${data.title}.`;
        }
        
        output.innerHTML = cite;
        output.classList.remove('empty');
    }
});
