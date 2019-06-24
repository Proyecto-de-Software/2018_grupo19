function exportToPdf() {
    var doc = new jsPDF()
    var img_motivo = document.getElementById('chart-motivo-png').children[0]
    var img_genero = document.getElementById('chart-genero-png').children[0]
    var img_localidad = document.getElementById('chart-localidad-png').children[0]
    doc.addImage(img_motivo, 'JPEG', 10, 10, 200, 100)
    doc.addImage(img_genero, 'JPEG', 10, 110, 200, 100)
    doc.addImage(img_localidad, 'JPEG', 10, 210, 200, 100)
    doc.save()
}