var nReloads = 0;
function data(offset) {
    var ret = [];
    for (var x = 0; x <= 360; x += 10) {
        var v = (offset + x) % 360;
        ret.push({
            x: x,
            y: Math.sin(Math.PI * v / 180).toFixed(4),
            z: Math.cos(Math.PI * v / 180).toFixed(4)
        });
    }
    return ret;
}

var graph = Morris.Line({
    element: 'graph',
    data: data(0),
    xkey: 'x',
    ykeys: ['y', 'z'],
    labels: ['Variable One', 'Variable Two'], // Translated the Persian labels to English
    parseTime: false,
    ymin: -1.0,
    ymax: 1.0,
    hideHover: true,
    lineColors: ['#4527a0', '#63bd91']
});

function update() {
    nReloads++;
    graph.setData(data(5 * nReloads));
}

setInterval(update, 400);
