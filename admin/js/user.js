
			// 初始化数据开始
			// 1. 很重要的一步 : 定义人员编号 编号是一串没有意义的数字,主要是为了方便人员管理用的
			var id_index = 1; // 初始化
			// 2. 添加初始化人员
		var p1 ={"id":id_index,"Givenname":"ZHOU","Surname":"KAREN","Gender":"Female","Birthday":2021/01/01,"ID":"3739198","Email":"s3739198@student.rmit.edu.au","Address":"160,victoria st","Phonenumber":"0479129996"};
			// 3. 每次使用了编号索引别忘了让编号自加,这样人员编号都不一样,方便管理,就和我们身份证号一个道理
			id_index++;
			// 添加初始化人员
			var p2 = {"id":id_index,"Givenname":"kim","Surname":"zhongyun","Gender":"Female","Birthday":2021/01/02,"ID":"840824","Email":"s3739198@student.rmit.edu.au","Address":"160,victoria st","Phonenumber":"04792222"};
			// 每次使用了编号索引别忘了让编号自加,这样人员编号都不一样,方便管理,就和我们身份证号一个道理
			id_index++;
			// 为了方便操作者两个数据,我们把数据封装在一个数组中
			var persons = [p1,p2];
			// 初始化数据结束
			
			// 编写显示人员方法
			function showPersons(){
				// 按ID获取table
				var tb1 = document.getElementById("tb1");
				// 给tb1拼接元素
				
				var str = "<tr><th>NO.</th><th>GIVEN NAME</th><th>SURNAME</th><th>GENDER</th><th>DOB</th><th>ID</th><th>Email</th><th>Address</th><th>PHONE NUMBER</th><th>OPERATION</th></tr>";
				// 遍历JSON数组继续拼接
				for (var i = 0; i < persons.length; i++) {
					var p = persons[i];
					str += "<tr><td>"+p.id+"</td><td>"+p.Givenname+"</td><td>"+p.Surname+"</td><td>"+p.Gender+"</td><td>"+p.Birthday+"</td><td>"+p.ID+"</td><td>"+p.Email+"</td><td>"+p.Address+"</td><td>"+p.Phonenumber+"</td><th><button type='button'onclick='showUpdateForm("+p.id+");' >UPDATE</button>||<button type='button' onclick='deletePerson("+p.id+")'>DELETE</button></th></tr>";
				}
				// 最后把拼接好的字符串放入table中
				tb1.innerHTML = str;
			}
			
			// 编写添加方法
			function addPerson(){
				// 接收页面数据
				var Givenname = document.getElementById("Given name");
				var Surname = document.getElementById("Surname");
				var Gender = document.getElementById("Gender");
				var Birthday = document.getElementById("Birthday");
				var ID = document.getElementById("ID");
				var Email = document.getElementById("Email");
				var Address = document.getElementById("Address");
				var Phonenumber = document.getElementById("Phonenumber");
				// 获取这个对象的主键信息
				var id = id_index;
				// 主键用过就自增
				id_index++;
				// 开始添加数据
				var p = {"id":id,"Givenname":Givenname.value,"Surname":Surname.value,"Gender":Gender.value,"Birthday":Birthday.value,"ID":ID.value,"Email":Email.value,"Address":Address.value,"Phonenumber":Phonenumber.value};
				// 添加到数组
				persons.push(p);
				// 因为数组数据发生了改变,重新调用查询方法刷新页面显示
				showPersons();
			}
			
			
			
		function deletePerson(pid){
	// 先有情提示一下
	var con = window.confirm("Delete data?");
	// 判断一下
	if(con == true){
		// 找到要删除的数据 删除
		for (var i = 0; i < persons.length; i++) {
			if(persons[i].id == pid){
				delete persons[i];
			}
		}
		// 删除后需要去下null值
		for(var i = 0;i<persons.length;i++){
						if(persons[i]==''||persons[i]==null||typeof(persons[i])==undefined){
							persons.splice(i,1);
							i=i-1;
						}



		}
		// 因为数据发生改变,需要刷新下数组数据的展示
		showPersons();
	}
			
}

function showUpdateForm(pid){
				// 找到要更新的数据
				for (var i = 0; i < persons.length; i++) {
					if(persons[i].id == pid){
						var p = persons[i];
						// 将获取到的数据显示到form表单中的元素
						document.getElementById("upid").value = p.id;
						document.getElementById("upsname").value = p.Givenname;
						document.getElementById("upgname").value = p.Surname;
						document.getElementById("uBirthday").value = p.Birthday;
						document.getElementById("uPhonenumber").value = p.Phonenumber;
						document.getElementById("uGender").value = p.Gender;
						document.getElementById("uID").value = p.ID;
						document.getElementById("uEmail").value = p.Email;
						document.getElementById("uAddress").value = p.Address;
						// 显示form
						document.getElementById("form2").style.display = "";
					}
				}
			}
			
			// 数据【更新】JS
			function updatePerson(){
				// 获取页面数据
				var p = {};
				p.id = document.getElementById("upid").value;
				p.Surname = document.getElementById("upsname").value;
				p.Givenname = document.getElementById("upgname").value;
				p.Birthday = document.getElementById("uBirthday").value;
				p.Phonenumber = document.getElementById("uPhonenumber").value;
				p.Gender = document.getElementById("uGender").value;
				p.ID = document.getElementById("uID").value;
				p.Email = document.getElementById("uEmail").value;
				p.Adddress = document.getElementById("Adddress").value;
				// 开始更新
				for (var i = 0; i < persons.length; i++) {
					if(persons[i].id == p.id){
						persons[i] = p;
					}
				}
				// 因为数据发生了改动,所以重新刷新下数据展示
				showPersons();
			}			

function showAddForm(){
				// 获取添加表单
				var form1 = document.getElementById("form1");
				// 设置form1的属性为显示 因为标签本来就是可以显示的 我们只要把display的属性值去掉即可
				form1.style.display = "";
			}
			
			// 根据ID隐藏form表单
			function hideForm(formid){
				// 按ID获取这个form
				var form = document.getElementById(formid);
				// 设置form表单的显示属性为隐藏
				form.style.display = "none";
			}
			

