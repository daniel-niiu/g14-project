function member_validation(){ 
	var regex_number = /^[\d]+$/; 
	var regex_spec_char = /^[a-zA-Z\d\_]+$/; 
	var regex_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
	var regex_add_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?.@#]/; // without comma
	var regex_ic_symbols= /[a-zA-Z!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/; // without - symbol
	var regex_num_symbols= /[\d-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
	var regex_dob= /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;

    var MID = document.getElementById('mid').value; 
    var Eng_Name = document.getElementById('english').value; 
    var Chi_Name = document.getElementById('chinese').value; 
    var NRIC = document.getElementById('nric').value; 
    var citizen = document.getElementById('citizen').value;
    var dob = document.getElementById('m_dob').value;
    var contact = document.getElementById('co_contact').value;  
    var job = document.getElementById('m_job').value;
    var address = document.getElementById('m_address').value;
    var acceptdate = document.getElementById('m_accept-date').value; 
    var recommenderid = document.getElementById('m_recommender-id').value; 
    var recommender = document.getElementById('m_recommender').value;   
     
	var v1,v2,v3,v4,v5,v6,v7,v8,v9,v10,v11,v12 = false;
    if(MID == "" || !MID.match(regex_spec_char)){  
		document.getElementById('mid').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('pmid').style.display = "block";
        v1 = false; 
    }   
    else{  
		document.getElementById('mid').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('pmid').style.display = "none";
		v1 = true; 
    } 
    if(!Eng_Name || Eng_Name.match(regex_num_symbols)){ 
		document.getElementById('english').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_m_eng').style.display = "block"; 
        v2 = false;
    }     
    else{ 
    	document.getElementById('english').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_m_eng').style.display = "none";
		v2 = true;
    }  
    if(!Chi_Name || Chi_Name.match(regex_num_symbols)){ 
		document.getElementById('chinese').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_m_chi').style.display = "block"; 
        v3 = false; 
    }    
    else{ 
    	document.getElementById('chinese').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_m_chi').style.display = "none"; 
		v3 = true;
    } 
    if(!NRIC ||  NRIC.match(regex_ic_symbols)){ 
		document.getElementById('nric').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_ic').style.display = "block"; 
        v4 = false;
    }   
    else{ 
    	document.getElementById('nric').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_ic').style.display = "none"; 
		v4 = true;
    } 
    if(citizen != "" && citizen.match(regex_num_symbols)){ 
		document.getElementById('citizen').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_citizen').style.display = "block"; 
        v5 = false;
    }   
    else{ 
    	document.getElementById('citizen').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_citizen').style.display = "none"; 
		v5 = true;
    }  
    if(!dob || !dob.match(regex_dob)){ 
		document.getElementById('m_dob').className  = "bg-gray-50 border border-red-500 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_dob').style.display = "block"; 
        v6= false;
    }   
    else{ 
		document.getElementById('m_dob').className  = "bg-gray-50 border border-green-500 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        document.getElementById('p_dob').style.display = "none"; 
		v6 = true;
    }  
    if(!contact || !contact.match(regex_number)){ 
		document.getElementById('co_contact').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_co').style.display = "block"; 
        v7= false;
    }   
    else{ 
    	document.getElementById('co_contact').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_co').style.display = "none"; 
		v7 = true;
    } 

    if(!job || job.match(regex_symbols)){ 
		document.getElementById('m_job').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_job').style.display = "block"; 
        v8= false;
    }   
    else{ 
    	document.getElementById('m_job').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_job').style.display = "none"; 
		v8 = true;
    }  
    if(!address || address.match(regex_add_symbols)){ 
		document.getElementById('m_address').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_add').style.display = "block"; 
        v9= false;
    }   
    else{ 
    	document.getElementById('m_address').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_add').style.display = "none"; 
		v9 = true;
    }   
    if(!acceptdate || !acceptdate.match(regex_dob)){ 
		document.getElementById('m_accept-date').className  = "bg-gray-50 border border-red-500 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_acc-date').style.display = "block"; 
        v10= false;
    }    
    else{ 
    	document.getElementById('m_accept-date').className  = "bg-gray-50 border border-green-500 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        document.getElementById('p_acc-date').style.display = "none"; 
		v10 = true;
    }    
    if(!recommenderid || !recommenderid.match(regex_spec_char)){ 
		document.getElementById('m_recommender-id').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_rid').style.display = "block"; 
        v11= false;
    }   
    else{ 
    	document.getElementById('m_recommender-id').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_rid').style.display = "none"; 
		v11 = true;
    }  
 
    if(!recommender || recommender.match(regex_num_symbols)){ 
		document.getElementById('m_recommender').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_rname').style.display = "block"; 
        v12= false;
    }   
    else{ 
    	document.getElementById('m_recommender').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_rname').style.display = "none"; 
		v12 = true;
    }  
    document.getElementById('m_gender').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
	document.getElementById('m_member').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		 
    if(v1 == false || v2 == false || v3 == false || v4 == false || v5 == false || v6 == false || v7 == false|| v8 == false || v9 == false || v10 == false || v11 == false || v12 == false){  
    	return false;
    }
    else{
    	return true;    // in success case
    }  
}   


function tablet_validation(){ 

	var regex_price = /^[\d.]+$/; 
	var regex_number = /^[\d]+$/; 
	var regex_spec_char = /^[a-zA-Z\d\_]+$/; 
	var regex_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
	var regex_add_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?.@#]/; // without comma
	var regex_ic_symbols= /[a-zA-Z!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/; // without - symbol
	var regex_num_symbols= /[\d-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
	var regex_dob= /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;

    var id = document.getElementById('id').value; 
    var date = document.getElementById('date').value; 
    var zone = document.getElementById('zone').value; 
    var tier = document.getElementById('tier').value; 
    var row = document.getElementById('row').value;
    var price = document.getElementById('price').value;
    var english = document.getElementById('english').value;  
    var chinese = document.getElementById('chinese').value;
    var contact1 = document.getElementById('contact1').value;
    var contact2 = document.getElementById('contact2').value; 
    var address = document.getElementById('address').value; 
    //var payment = document.getElementById('payment').value;
    var ancestor_english = document.getElementById('ancestor-english').value; 
    var ancestor_chinese = document.getElementById('ancestor-chinese').value;  
 
	var v1,v2,v3,v4,v5,v6,v7,v8,v9,v10,v11,v12,v13,v14 = false;

    if(id == "" || !id.match(regex_spec_char)){  
		document.getElementById('id').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_tid').style.display = "block";
        v1 = false; 
    }   
    else{  
		document.getElementById('id').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_tid').style.display = "none";
		v1 = true; 
    } 
    if(!date || !date.match(regex_dob)){ 
		document.getElementById('date').className  = "bg-gray-50 border border-red-500 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_ins_date').style.display = "block"; 
        v2= false;
    }    
    else{ 
    	document.getElementById('date').className  = "bg-gray-50 border border-green-500 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        document.getElementById('p_ins_date').style.display = "none"; 
		v2 = true;
    }   
    if(!zone || !zone.match(regex_number)){ 
		document.getElementById('zone').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_zone').style.display = "block";
        v3= false;
    }    
    else{ 
		document.getElementById('zone').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_zone').style.display = "none";
		v3 = true;
    }  
    if(!tier || !tier.match(regex_number)){ 
		document.getElementById('tier').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_tier').style.display = "block"; 
        v4= false;
    }    
    else{ 
		document.getElementById('tier').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_tier').style.display = "none";
		v4 = true;
    }    
    if(!row || !row.match(regex_number)){ 
		document.getElementById('row').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_row').style.display = "block"; 
        v5= false;
    }    
    else{ 
		document.getElementById('row').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_row').style.display = "none";
		v5 = true;
    }        
    if(!price || !price.match(regex_price)){ 
		document.getElementById('price').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_price').style.display = "block"; 
        v6= false;
    }    
    else{ 
		document.getElementById('price').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_price').style.display = "none";
		v6 = true;
    }
    if(!english || english.match(regex_num_symbols)){ 
		document.getElementById('english').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_m_eng').style.display = "block"; 
        v7 = false;
    }     
    else{ 
    	document.getElementById('english').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_m_eng').style.display = "none";
		v7 = true;
    } 
    if(!chinese || chinese.match(regex_num_symbols)){ 
		document.getElementById('chinese').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_m_chi').style.display = "block"; 
        v8 = false;
    }     
    else{ 
    	document.getElementById('chinese').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_m_chi').style.display = "none";
		v8 = true;
    } 

    if(!contact1 || !contact1.match(regex_number)){ 
		document.getElementById('contact1').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_co1').style.display = "block"; 
        v9= false;
    }   
    else{ 
    	document.getElementById('contact1').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_co1').style.display = "none"; 
		v9 = true;
    } 
    if(contact2 != "" && !contact2.match(regex_number)){ 
		document.getElementById('contact2').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_co2').style.display = "block"; 
        v10= false;
    }   
    else{ 
    	document.getElementById('contact2').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_co2').style.display = "none"; 
		v10 = true;
    } 
    if(!address && address.match(regex_add_symbols)){ 
		document.getElementById('address').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_add').style.display = "block"; 
        v11= false;
    }   
    else{ 
    	document.getElementById('address').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_add').style.display = "none"; 
		v11 = true;
    }
    if(!ancestor_english || ancestor_english.match(regex_num_symbols)){ 
		document.getElementById('ancestor-english').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_anc_eng').style.display = "block"; 
        v12 = false;
    }     
    else{ 
    	document.getElementById('ancestor-english').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_anc_eng').style.display = "none";
		v12 = true;
    } 
    if(!ancestor_chinese || ancestor_chinese.match(regex_num_symbols)){ 
		document.getElementById('ancestor-chinese').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_anc_chi').style.display = "block"; 
        v13 = false;
    }     
    else{ 
    	document.getElementById('ancestor-chinese').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_anc_chi').style.display = "none";
		v13 = true;
    } 
    document.getElementById('t_payment').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";

    if(v1 == false || v2 == false || v3 == false || v4 == false || v5 == false || v6 == false || v7 == false|| v8 == false || v9 == false || v10 == false || v11 == false || v12 == false || v13 == false){  
    	return false;
    }
    else{
    	return true;    // in success case
    }  
    
}


function tablet_transaction_validation(){ 

	var regex_price = /^[\d.]+$/; 
	var regex_spec_char = /^[a-zA-Z\d\_]+$/; 
	var regex_num_symbols= /[\d-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/; 
	var regex_dob= /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/; 

    var receipt = document.getElementById('receipt').value; 
    var date = document.getElementById('date').value; 
    var amount = document.getElementById('amount').value;  
    var english = document.getElementById('english').value;  
    var chinese = document.getElementById('chinese').value; 
 
	var v2,v3,v4,v5,v6 = false;
  
    if(receipt == "" || !receipt.match(regex_spec_char)){  
		document.getElementById('receipt').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_r_no').style.display = "block";
        v2 = false; 
    }   
    else{  
		document.getElementById('receipt').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_r_no').style.display = "none";
		v2 = true; 
    } 
    if(!date || !date.match(regex_dob)){ 
		document.getElementById('date').className  = "bg-gray-50 border border-red-500 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_r_date').style.display = "block"; 
        v3= false;
    }    
    else{ 
    	document.getElementById('date').className  = "bg-gray-50 border border-green-500 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        document.getElementById('p_r_date').style.display = "none"; 
		v3 = true;
    }         
    if(!amount || !amount.match(regex_price)){ 
		document.getElementById('amount').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_amount').style.display = "block"; 
        v4= false;
    }    
    else{ 
		document.getElementById('amount').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_amount').style.display = "none";
		v4 = true;
    }
    if(!english || english.match(regex_num_symbols)){ 
		document.getElementById('english').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_eng').style.display = "block"; 
        v5 = false;
    }     
    else{ 
    	document.getElementById('english').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_eng').style.display = "none";
		v5 = true;
    } 
    if(!chinese || chinese.match(regex_num_symbols)){ 
		document.getElementById('chinese').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_chi').style.display = "block"; 
        v6 = false;
    }     
    else{ 
    	document.getElementById('chinese').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_chi').style.display = "none";
		v6 = true;
    }  
    if(v2 == false || v3 == false || v4 == false || v5 == false || v6 == false){  
    	return false;
    }
    else{
    	return true;    // in success case
    }   
    
}


function blessing_validation(){  
	var regex_price = /^[\d.]+$/; 
	var regex_number = /^[\d]+$/; 
	var regex_spec_char = /^[a-zA-Z\d\_]+$/;  
	var regex_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
	var regex_add_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?.@#]/; // without comma
	var regex_ic_symbols= /[a-zA-Z!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/; // without - symbol
	var regex_num_symbols= /[\d-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
	var regex_dob= /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;

    var id = document.getElementById('id').value; 
    var english = document.getElementById('english').value;  
    var chinese = document.getElementById('chinese').value; 
    var contact = document.getElementById('contact').value;
    var blessing = document.getElementById('blessing').value;  
    var votive = document.getElementById('votive').value;  
    var blessing_receipt = document.getElementById('blessing_receipt').value;  
    var votive_receipt = document.getElementById('votive_receipt').value;  
    var date = document.getElementById('date').value; 
    var amount = document.getElementById('amount').value;  

	var v1,v2,v3,v4,v5,v6,v7,v8,v9,v10 = false;     
    if(id == "" || !id.match(regex_spec_char)){   
		document.getElementById('id').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_id').style.display = "block";
        v1 = false; 
    }   
    else{  
		document.getElementById('id').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_id').style.display = "none";
		v1 = true; 
    } 
    if(!english || english.match(regex_num_symbols)){ 
		document.getElementById('english').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_eng').style.display = "block"; 
        v2 = false;
    }     
    else{ 
    	document.getElementById('english').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_eng').style.display = "none";
		v2 = true;
    } 
    if(!chinese || chinese.match(regex_num_symbols)){ 
		document.getElementById('chinese').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_chi').style.display = "block"; 
        v3 = false;
    }     
    else{ 
    	document.getElementById('chinese').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_chi').style.display = "none";
		v3 = true;
	}
    if(!contact || !contact.match(regex_number)){ 
		document.getElementById('contact').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_co').style.display = "block"; 
        v4= false;
    }   
    else{ 
    	document.getElementById('contact').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_co').style.display = "none"; 
		v4 = true;
    }  
    //blessing does not accept empty
    if(blessing !=""  && !blessing.match(regex_price)){ 
		document.getElementById('blessing').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('b_price').style.display = "block"; 
        v5= false;
    }    
    else{ 
		document.getElementById('blessing').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('b_price').style.display = "none";
		v5 = true;
    }   
    //votive does not accept empty
    if(votive!=""  && !votive.match(regex_price)){ 
		document.getElementById('votive').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('v_price').style.display = "block"; 
        v6= false;
    }    
    else{ 
		document.getElementById('votive').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('v_price').style.display = "none";
		v6 = true;
    } 

    if(blessing_receipt!=""  && !blessing_receipt.match(regex_spec_char)){  
		document.getElementById('blessing_receipt').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_b_receipt').style.display = "block";
        v7 = false; 
    }   
    else{  
		document.getElementById('blessing_receipt').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_b_receipt').style.display = "none";
		v7 = true; 
    } 
    if(votive_receipt !="" && !votive_receipt.match(regex_spec_char)){  
		document.getElementById('votive_receipt').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_v_receipt').style.display = "block";
        v8 = false; 
    }   
    else{  
		document.getElementById('votive_receipt').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_v_receipt').style.display = "none";
		v8 = true; 
    } 
    if(!date || !date.match(regex_dob)){ 
		document.getElementById('date').className  = "bg-gray-50 border border-red-500 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_r_date').style.display = "block"; 
        v9= false;
    }    
    else{ 
    	document.getElementById('date').className  = "bg-gray-50 border border-green-500 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        document.getElementById('p_r_date').style.display = "none"; 
		v9 = true;
    }     
    //does not accept empty
    if(!amount || !amount.match(regex_price)){ 
		document.getElementById('amount').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('r_amount').style.display = "block"; 
        v10 = false;
    }    
    else{ 
		document.getElementById('amount').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('r_amount').style.display = "none";
		v10 = true;
    }  
    if(v1 == true && v2 == true && v3 == true && v4 == true && v5 == true && v6 == true && v7 == true && v8 == true && v9 == true && v10 == true){  
    	return true;
    } 
    else{
    	return false;    // in success case
    }    
}


function glight_validation(){  
	var regex_price = /^[\d.]+$/; 
	var regex_number = /^[\d]+$/; 
	var regex_spec_char = /^[a-zA-Z\d\_]+$/;  
	var regex_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
	var regex_add_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?.@#]/; // without comma
	var regex_ic_symbols= /[a-zA-Z!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/; // without - symbol
	var regex_num_symbols= /[\d-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
	var regex_dob= /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;

    var id = document.getElementById('gl-id').value; 
    var english = document.getElementById('english').value;  
    var chinese = document.getElementById('chinese').value; 
    var price = document.getElementById('price').value;   
    var receipt = document.getElementById('receipt').value;   
    var amount = document.getElementById('amount').value; 
    var contact = document.getElementById('contact').value;
    var date = document.getElementById('date').value;  

	var v1,v2,v3,v4,v5,v6,v7,v8 = false;     
    if(id == "" || !id.match(regex_spec_char)){   
		document.getElementById('gl-id').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_id').style.display = "block";
        v1 = false; 
    }   
    else{  
		document.getElementById('gl-id').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_id').style.display = "none";
		v1 = true; 
    } 
    if(!english || english.match(regex_num_symbols)){ 
		document.getElementById('english').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_eng').style.display = "block"; 
        v2 = false;
    }     
    else{ 
    	document.getElementById('english').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_eng').style.display = "none";
		v2 = true;
    } 
    if(!chinese || chinese.match(regex_num_symbols)){ 
		document.getElementById('chinese').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_chi').style.display = "block"; 
        v3 = false;
    }     
    else{ 
    	document.getElementById('chinese').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_chi').style.display = "none";
		v3 = true;
	}
    //blessing does not accept empty
    if(!price || !price.match(regex_price)){ 
		document.getElementById('price').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_price').style.display = "block"; 
        v4= false;
    }    
    else{ 
		document.getElementById('price').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_price').style.display = "none";
		v4 = true;
    }   
    if(receipt == "" || !receipt.match(regex_spec_char)){  
		document.getElementById('receipt').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_receipt').style.display = "block";
        v5 = false; 
    }   
    else{  
		document.getElementById('receipt').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_receipt').style.display = "none";
		v5 = true; 
    }     
    if(!date || !date.match(regex_dob)){ 
		document.getElementById('date').className  = "bg-gray-50 border border-red-500 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_r_date').style.display = "block"; 
        v6= false;
    }    
    else{ 
    	document.getElementById('date').className  = "bg-gray-50 border border-green-500 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        document.getElementById('p_r_date').style.display = "none"; 
		v6 = true;
    } 
    //does not accept empty
    if(!amount || !amount.match(regex_price)){ 
		document.getElementById('amount').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_amount').style.display = "block"; 
        v7 = false;
    }    
    else{ 
		document.getElementById('amount').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_amount').style.display = "none";
		v7 = true;
    }  
    if(!contact || !contact.match(regex_number)){ 
		document.getElementById('contact').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_co').style.display = "block"; 
        v8= false;
    }   
    else{ 
    	document.getElementById('contact').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_co').style.display = "none"; 
		v8 = true;
    }   
    if(v1 == true && v2 == true && v3 == true && v4 == true && v5 == true && v6 == true && v7 == true && v8 == true){  
    	return true;
    } 
    else{
    	return false;    // in success case
    }    
}


function product_validation(){ 

	var regex_price = /^[\d.]+$/; 
	var regex_number = /^[\d]+$/; 
	var regex_spec_char = /^[a-zA-Z\d\_]+$/; 
	var regex_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
	var regex_add_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?.@#]/; // without comma
	var regex_ic_symbols= /[a-zA-Z!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/; // without - symbol
	var regex_num_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
	var regex_dob= /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;

    var id = document.getElementById('id').value; 
    var english = document.getElementById('english').value; 
    var chinese = document.getElementById('chinese').value;    
    var price = document.getElementById('price').value; 
 
	var v1,v2,v3,v4 = false; 

    if(id == "" || !id.match(regex_spec_char)){  
		document.getElementById('id').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_id').style.display = "block";
        v1 = false; 
    }   
    else{  
		document.getElementById('id').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_id').style.display = "none";
		v1 = true; 
    }
    if(!english || english.match(regex_num_symbols)){ 
		document.getElementById('english').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_eng').style.display = "block"; 
        v2 = false; 
    }    
    else{ 
    	document.getElementById('english').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_eng').style.display = "none"; 
		v2 = true;
    } 
    if(!chinese || chinese.match(regex_num_symbols)){ 
		document.getElementById('chinese').className  = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        document.getElementById('p_chi').style.display = "block"; 
        v3 = false; 
    }    
    else{ 
    	document.getElementById('chinese').className  = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_chi').style.display = "none"; 
		v3 = true;
    } 
    if(!price || !price.match(regex_price)){ 
		document.getElementById('price').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
		document.getElementById('p_price').style.display = "block"; 
        v4= false;
    }    
    else{ 
		document.getElementById('price').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
		document.getElementById('p_price').style.display = "none";
		v4 = true;
    } 
    if(v1 == false || v2 == false || v3 == false || v4 == false){  
    	return false;
    }
    else{
    	return true;    // in success case
    }    
}
    
function stock_validation(){ 

    var regex_price = /^[\d.]+$/; 
    var regex_number = /^[\d]+$/; 
    var regex_spec_char = /^[a-zA-Z\d\_]+$/; 
    var regex_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
    var regex_add_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?.@#]/; // without comma
    var regex_ic_symbols= /[a-zA-Z!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/; // without - symbol
    var regex_num_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
    var regex_dob= /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;

    var id = document.getElementById('search').value; 
    var date = document.getElementById('date').value;     
    var receipt = document.getElementById('receipt').value;  
    var stock = document.getElementById('stock-in').value;
    var balance = document.getElementById('balance1').value; 

    var v1,v2,v3,v4,v5 = false;  
    if(id == ""){  
        document.getElementById('search').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        //document.getElementById('p_id').style.display = "block";
        v1 = false; 
    }   
    else{  
        document.getElementById('search').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        //document.getElementById('p_id').style.display = "none";
        v1 = true; 
    }
     
    if(!date || !date.match(regex_dob)){ 
        document.getElementById('date').className  = "bg-gray-50 border border-red-500 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        //document.getElementById('p_r_date').style.display = "block"; 
        v2= false;
    }    
    else{ 
        document.getElementById('date').className  = "bg-gray-50 border border-green-500 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        //document.getElementById('p_r_date').style.display = "none"; 
        v2 = true;
    } 
    if(receipt == "" || !receipt.match(regex_spec_char)){  
        document.getElementById('receipt').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        //document.getElementById('p_receipt').style.display = "block";
        v3 = false; 
    }   
    else{  
        document.getElementById('receipt').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        //document.getElementById('p_receipt').style.display = "none";
        v3 = true; 
    }   
    if(!stock || !stock.match(regex_price)){ 
        document.getElementById('stock-in').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        //document.getElementById('p_price').style.display = "block"; 
        v4= false;
    }    
    else{ 
        document.getElementById('stock-in').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        //document.getElementById('p_price').style.display = "none";
        v4 = true;
    } 
    if(!balance || !balance.match(regex_price)){ 
        document.getElementById('balance1').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        //document.getElementById('p_price').style.display = "block"; 
        v5= false;
    }    
    else{ 
        document.getElementById('balance1').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        //document.getElementById('p_price').style.display = "none";
        v5 = true;
    } 
    if(v1 == false || v2 == false || v3 == false || v4 == false || v5 == false){  
        return false;
    }
    else{
        return true;    // in success case
    }  
     
}

   
function stockout_validation(){ 

    var regex_price = /^[\d.]+$/; 
    var regex_number = /^[\d]+$/; 
    var regex_spec_char = /^[a-zA-Z\d\_]+$/; 
    var regex_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
    var regex_add_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?.@#]/; // without comma
    var regex_ic_symbols= /[a-zA-Z!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/; // without - symbol
    var regex_num_symbols= /[-!$%^&*()_+|~=`{}\[\]:\/;<>?,.@#]/;
    var regex_dob= /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/; 

    var id = document.getElementById('search').value; 
    var date = document.getElementById('date').value;     
    var receipt = document.getElementById('receipt').value;  
    var stock = document.getElementById('stock-out').value;
    var balance = document.getElementById('balance1').value; 
    

    var v1,v2,v3,v4,v5 = false;  
    if(id == ""){  
        document.getElementById('search').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        //document.getElementById('p_id').style.display = "block";
        v1 = false; 
    }   
    else{  
        document.getElementById('search').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        //document.getElementById('p_id').style.display = "none";
        v1 = true; 
    }
     
    if(!date || !date.match(regex_dob)){ 
        document.getElementById('date').className  = "bg-gray-50 border border-red-500 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        //document.getElementById('p_r_date').style.display = "block"; 
        v2= false;
    }    
    else{ 
        document.getElementById('date').className  = "bg-gray-50 border border-green-500 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        //document.getElementById('p_r_date').style.display = "none"; 
        v2 = true;
    } 
    if(receipt == "" || !receipt.match(regex_spec_char)){  
        document.getElementById('receipt').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        //document.getElementById('p_receipt').style.display = "block";
        v3 = false; 
    }   
    else{  
        document.getElementById('receipt').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        //document.getElementById('p_receipt').style.display = "none";
        v3 = true; 
    }   
    if(!stock || !stock.match(regex_price)){ 
        document.getElementById('stock-out').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        //document.getElementById('p_price').style.display = "block"; 
        v4= false;
    }    
    else{ 
        document.getElementById('stock-out').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        //document.getElementById('p_price').style.display = "none";
        v4 = true;
    } 
    if(!balance || !balance.match(regex_price)){ 
        document.getElementById('balance1').className = "bg-gray-50 border border-red-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500";
        //document.getElementById('p_price').style.display = "block"; 
        v5= false;
    }    
    else{ 
        document.getElementById('balance1').className = "bg-gray-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500";
        //document.getElementById('p_price').style.display = "none";
        v5 = true;
    } 
    if(v1 == false || v2 == false || v3 == false || v4 == false || v5 == false){  
        return false;
    }
    else{
        return true;    // in success case
    }  
     
}