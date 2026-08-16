async function getUser() {
  try {
    let userTable = document.getElementById("userTable");

    const response = await fetch("http://127.0.0.1:8000/api/v1/users");
    const data = await response.json();
    // console.log(data.data.data)
    const result = data.data.data;
    console.log(result);
    let output = "";
    result.forEach((value) => {
      output += `
                <tr>
                    <td>${value.id}</td>
                    <td>${value.name}</td>
                    <td>${value.email}</td>
                    <td>${value.role}</td>
                    <td>${value.status}</td>
                    <td>
                        <button type="button" onclick="deleteUser(${value.id})">Delete</button>
                    </td>
                </tr>
            `;
    });
    userTable.innerHTML = output;
  } catch (error) {
    console.log("Error fetch", error);
  }
}
getUser();

const name = document.getElementById("name");
const email = document.getElementById("email");
const password = document.getElementById("password");
const role = document.getElementById("role");
const status = document.getElementById("status");

const formSubmit = document.getElementById("formSubmit");

formSubmit.addEventListener("submit", async function createUser(param) {
  param.preventDefault();
  let user = {
    name: name.value,
    email: email.value,
    password: password.value,
    role: role.value,
    status: status.value,
  };
  const response = await fetch("http://127.0.0.1:8000/api/v1/users/store", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      'Accept': "application/json",
    },
    body: JSON.stringify(user),
  });
  if (response.ok) {
    getUser();
  }
  console.log(user);
});

async function deleteUser(id){
    if(confirm('Are you sure ?')){
        const response = await fetch(`http://127.0.0.1:8000/api/v1/users/${id}`,{
            method : 'DELETE',
            headers : {
                'Accept' : 'application/json'
            },
        })
        

        if(response.ok){
            getUser()
        }
    }
}