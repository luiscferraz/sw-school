//
//===Validação CNPJ
function checkCnpj(src){
	
	d = src;
	if (!validaCnpj(d.value)){
		d.setCustomValidity("Por favor, forneça um CNPJ válido no formato xx.xxx.xxx/xxxx-xx");
	}
	else{
		d.setCustomValidity("");
	}
}

function validaCnpj(cnpj){
	exp = /\.|\-|\//g
    cnpj = cnpj.toString().replace( exp, "" );
	if (cnpj == "00000000000000")		
		return false;
    var dv = cnpj.substr(cnpj.length-2,cnpj.length);
    cnpj = cnpj.substr(0,12);
    /*calcular 1ڠdto verificador*/
    var soma;
    soma = cnpj[0]*6;
    soma += cnpj[1]*7;
    soma += cnpj[2]*8;
    soma += cnpj[3]*9;
    soma += cnpj[4]*2;
    soma += cnpj[5]*3;
    soma += cnpj[6]*4;
    soma += cnpj[7]*5;
    soma += cnpj[8]*6;
    soma += cnpj[9]*7;
    soma += cnpj[10]*8;
    soma += cnpj[11]*9;
    var dv1 = soma%11;
    if (dv1 == 10){
        dv1 = 0;
    }
    /*calcular 2ڠdto verificador*/
    soma = cnpj[0]*5;
    soma += cnpj[1]*6;
    soma += cnpj[2]*7;
    soma += cnpj[3]*8;
    soma += cnpj[4]*9;
    soma += cnpj[5]*2;
    soma += cnpj[6]*3;
    soma += cnpj[7]*4;
    soma += cnpj[8]*5;
    soma += cnpj[9]*6;
    soma += cnpj[10]*7;
    soma += cnpj[11]*8;
    soma += dv1*9;
    var dv2 = soma%11;
    if (dv2 == 10){
        dv2 = 0;
    }
    var digito = dv1+""+dv2;
    if(dv == digito){ /*compara o dv digitado ao dv calculado*/
        return true;
    }else{
        return false;
    }
}
//END CNPJ

//
//==== Validação CPF
function checkCPF(src){
	d = src;
	if (!ValidaCpf(d.value)){
		d.setCustomValidity("Por favor, forneça um CPF válido no formato xxx.xxx.xxx-xx");
	}
	else{
		d.setCustomValidity("");
	}
}

function ValidaCpf(cpf) { //2012 - nao mexer daqui pra baixo, parte sagrada, so Deus sabe como funciona // ....... 2013...rindo até agora kkk :x
	exp = /\.|\-/g
    cpf = cpf.toString().replace( exp, "" );
	if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
	return false;
	add = 0;
	for (i=0; i < 9; i ++)
	add += parseInt(cpf.charAt(i)) * (10 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
	rev = 0;
	if (rev != parseInt(cpf.charAt(9)))
	return false;
	add = 0;
	for (i = 0; i < 10; i ++)
	add += parseInt(cpf.charAt(i)) * (11 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
	rev = 0;
	if (rev != parseInt(cpf.charAt(10)))
	return false;
	len = cpf.length;
	if (len > 11)
	return false;
	return true;
} //fim da parte sagrada

//END CPF



//
//=== Validação Cor
function checkColor(src){
	d = src;
	var cor = $(d).val().replace('#','');
	$.get("ajaxMsg/"+cor,null,
		function(data) {   
			if(data == 'true'){
				d.setCustomValidity("Cor já utilizada");
			}
			else {
				d.setCustomValidity("");
			}
	});
};

//END Cor

//
// === Validação Acronym
function checkAcronym(src){
	d = src;
	var acronym = $(d).val();
	$.get("ajaxMsg/"+acronym,null,
		function(data) {   
			if(data == 'true'){
				d.setCustomValidity("Abreviação já utilizada");
			}
			else {
				d.setCustomValidity("");
			}
	});
};


//END Acronym

//Função de validação de datas
function checkDate(DATE){
            day = parseInt($(DATE).val().substring(0,2));
            month = parseInt($(DATE).val().substring(3,5));
            year = parseInt($(DATE).val().substring(6,10));

            //alert(day.toString()+month.toString()+year.toString());

            // verifica o dia valido para cada mes
            if ((day > 30 && (  month == 4 || month == 6 || month == 9 || month == 11 )) || day > 31) {
                DATE.setCustomValidity("Data inválida!");
            }

            // verifica se o mes e valido
            else if ( month > 12 ) {
                DATE.setCustomValidity("Data inválida!");
            }

            // verifica se e ano bissexto
            else if ((month == 2) && ( (day > 29) || ( (day > 28) && ((year / 4.0) != parseInt(year / 4.0))))) {
                DATE.setCustomValidity("Data inválida!");
            }

                        // Verifica se dia e mês estão com '00', e ano com '0000'               
                else if(day == 0 || month == 0 || year == 0){           
                        DATE.setCustomValidity("Data inválida!");               
                }

                //Zera a mensagem, caso a data esteja preenchida corretamente
            else{
                DATE.setCustomValidity("");
            }
};
//Fim da função de validação de data
//

//INICIO Função de validação de horas inicial e final (específico para Atividades)
function checkHour(){
    eStartHour = document.getElementById("actvStartHour");
    eEndHour = document.getElementById("actvEndHour");
    startHour = parseFloat($(eStartHour).val().substring(0,2)) + (parseFloat($(eStartHour).val().substring(3,5))/60.0);
    endHour = parseFloat($(eEndHour).val().substring(0,2)) + (parseFloat($(eEndHour).val().substring(3,5))/60.0);
    endMinute = parseInt($(eEndHour).val().substring(3,5));
    startMinute = parseInt($(eStartHour).val().substring(3,5));

    //          
    eStartHour.setCustomValidity("");           
    eEndHour.setCustomValidity("");

    // verifica se hora inicial é maior que hora final
    //if (startHour > endHour) {
        //alert(startHour.toString() + endHour.toString());
        //eStartHour.setCustomValidity("Hora inicial não pode ser maior que a final!");
    //}
        // verifica hora inicial
        else if(startHour > 23.99 || startMinute >= 60 ){
        //alert(startHour.toString() + endHour.toString());
        eStartHour.setCustomValidity("Hora inválida!");
    }
        // verifica hora final
        else if(endHour > 23.99 || endMinute >= 60 ){
        //alert(startMinute.toString() + endMinute.toString());
        eEndHour.setCustomValidity("Hora inválida!");
    }
        // Apaga o valor da mensagem, caso as horas inicial e final informadas sejam válidas
        else{
        //alert(startHour.toString() + endHour.toString());
        eStartHour.setCustomValidity("");
        eEndHour.setCustomValidity("");
    }

};
//FIM Função de validação de horas inicial e final (específico para Atividades)