function Usurvey(name, id, url, op1name, op2name, pic1url, pic2url, author, date, amount, attributes, time) {
	this.name = name;
	this.id = id;
	this.url = url;
	this.op1name = op1name;
	this.op2name = op2name;
	this.pic1url = pic1url;
	this.pic2url = pic2url;
	this.author = author;
	this.date = date;
	this.amount = amount;
	this.attributes = attributes;
	this.time = time;
}
function SurveyItem(picurl, attri) {
	this.picurl = picurl;
	this.attri = attri;
}
function shuffle(o){ //v1.0
    for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
};