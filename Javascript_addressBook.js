function Address(company, first_name, last_name, street, city, state, phone){
	this.company = company;
	this.first_name = first_name;
	this.last_name = last_name;
	this.street = street;
	this.city = city;
	this.state = state;
	this.phone = phone;
}
var addr = [];

addr[0] = new Address('Company1', 'John', 'Smith', '123 Anywhere St', 'Fargo', 'ID', '999-444-4512');
addr[1] = new Address('Company2', 'Jon', 'Smithy', '134 Anywhere St', 'Fargo', 'ID', '999-444-4512');
addr[2] = new Address('Company3', 'Joh', 'Smitts', '153 Anywhere St', 'Fargo', 'ID', '999-444-4512');
addr[3] = new Address('Company4', 'Johnny', 'Smith', '165 Anywhere St', 'Fargo', 'ID', '999-444-4512');
addr[4] = new Address('Company5', 'Jonathan', 'Smith', '16 Anywhere St', 'Fargo', 'ID', '999-444-4512');

function search(str){
	var results = [];
	
	for (i=0; i<addr.length; i++){
		k = addr[i];
		if ((k.company.toUpperCase().indexOf(str.toUpperCase()) !== -1)  || (k.last_name.toUpperCase().indexOf(str.toUpperCase()) !== -1))
		{
			results.push(i);
		}
	}	
	return results;
}

result = search(process.argv[2]);

for (p = 0; p < result.length; p++){
	r = addr[result[p]];
	
console.log(`
${r.first_name} ${r.last_name}
${r.company}
${r.street}, ${r.city}, ${r.state}
${r.phone}
`);
			
}

//console.log(search(process.argv[2]));

