<template>
  <div class="employeeForm">
    <!-- Юр лицо и объект -->
    <div class="row">
      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Юр. лицо</label>
          <div class="col-sm-8 marginVauto">
            <input
              autocomplete="off"
              class="form-control form-control-sm"
              v-model="employee.entity"
            />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Объект</label>
          <div class="col-sm-8 marginVauto">
            <input
              autocomplete="off"
              class="form-control form-control-sm"
              v-model="employee.object"
            />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group row">
          <label  class="col-sm-4 col-form-label">Должность</label>
          <div class="col-sm-8 marginVauto">
            <input
              autocomplete="off"
              class="form-control form-control-sm"
              v-model="employee.post"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- ФИО -->
    <div class="row">
      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Фамилия</label>
          <div class="col-sm-8 marginVauto">
            <input
              autocomplete="off"
              class="form-control form-control-sm"
              v-model="employee.surname"
            />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Имя</label>
          <div class="col-sm-8 marginVauto">
            <input
              autocomplete="off"
              class="form-control form-control-sm"
              v-model="employee.name"
            />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Отчество</label>
          <div class="col-sm-8 marginVauto">
            <input
              autocomplete="off"
              class="form-control form-control-sm"
              v-model="employee.patronymic"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- дата рождения, гражданство -->
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Дата рождения</label>
          <div class="col-sm-9 marginVauto">
            <input
              autocomplete="off"
              class="form-control form-control-sm"
              v-model="employee.birthday"
            />
          </div>
        </div>
      </div>
      <div class="col-md-6 marginVauto">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Гражданство</label>
          <div class="col-sm-10 marginVauto">
            <input
              autocomplete="off"
              class="form-control form-control-sm"
              v-model="employee.citizenship"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- мето рождения -->
    <div class="form-group row">
      <label
        class="col-sm-5 col-form-label"
      >Место рождения (село, город, край, область, республика)</label>
      <div class="col-sm-7 marginVauto">
        <input
          autocomplete="off"
          class="form-control form-control-sm"
          v-model="employee.placeBirth"
        />
      </div>
    </div>

    <!-- адрес -->
    <div class="form-group row">
      <label
        class="col-sm-5 col-form-label"
      >Адрес (место жительства): индекс, область, город, улица, дом, квартира</label>
      <div class="col-sm-7 marginVauto">
        <input
          autocomplete="off"
          class="form-control form-control-sm"
          v-model="employee.address"
        />
      </div>
    </div>

    <!-- прописка -->
    <div class="form-group row">
      <label
        class="col-sm-5 col-form-label"
      >Адрес (место прописки): индекс, область, город, улица, дом, квартира</label>
      <div class="col-sm-7 marginVauto">
        <input
          autocomplete="off"
          class="form-control form-control-sm"
          v-model="employee.registration"
        />
      </div>
    </div>

    <!-- телефоны -->
    <div class="row">
      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-sm-5 col-form-label">Домашний тел.</label>
          <div class="col-sm-7 marginVauto">
            <input
              autocomplete="off"
              class="form-control form-control-sm"
              v-model="employee.homePhone"
            />
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Сотовый тел.</label>
          <div class="col-sm-10 marginVauto">
            <input
              autocomplete="off"
              class="form-control form-control-sm"
              v-model="employee.phone"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- паспорт -->
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Паспортные данные</label>
      <div class="col-sm-10 marginVauto">
        <input
          autocomplete="off"
          class="form-control form-control-sm"
          v-model="employee.passport"
        />
      </div>
    </div>

    <!-- семейное положение -->
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Семейное положение</label>
      <div class="col-sm-10 marginVauto">
        <input
          autocomplete="off"
          class="form-control form-control-sm"
          v-model="employee.familyStatus"
        />
      </div>
    </div>

    <!-- сведения о близкий -->
    <hr />
    <div>
      <label>Сведения о близких родственниках</label>
      <div class="row text-center">
        <div class="col-md-1 vertAlign borderR">Степень родства</div>
        <div class="col-md-2 vertAlign borderR">ФИО</div>
        <div class="col-md-1 vertAlign borderR">Дата рождения</div>
        <div class="col-md-2 vertAlign borderR">Место работы, должность</div>
        <div class="col-md-2 vertAlign borderR">Телефон</div>
        <div class="col-md-3 vertAlign">Адрес проживания</div>
      </div>
      <div v-for="relative in employee.relatives" v-bind:key="relative.id" class="row text-center">
        <div class="col-md-1 vertAlign borderR">
          <input autocomplete="off" class="form-control form-control-sm" v-model="relative.degree" />
        </div>
        <div class="col-md-2 vertAlign borderR">
          <input autocomplete="off" class="form-control form-control-sm" v-model="relative.fio" />
        </div>
        <div class="col-md-1 vertAlign borderR">
          <input
            autocomplete="off"
            class="form-control form-control-sm"
            v-model="relative.birthday"
          />
        </div>
        <div class="col-md-2 vertAlign borderR">
          <input autocomplete="off" class="form-control form-control-sm" v-model="relative.work" />
        </div>
        <div class="col-md-2 vertAlign borderR">
          <input autocomplete="off" class="form-control form-control-sm" v-model="relative.phone" />
        </div>
        <div class="col-md-3 vertAlign">
          <input autocomplete="off" class="form-control form-control-sm" v-model="relative.address" />
        </div>
        <div class="col-md-1 my-1">
          <button class="btn btn-danger" @click="deleteRelative(relative)">Удалить</button>
        </div>
      </div>
      <button class="btn btn-info" @click="addRelative">Добавить</button>
    </div>

    <!-- сведения об образовании -->
    <br />
    <hr />
    <div>
      <label>Образование</label>
      <div class="row text-center">
        <div class="col-md-1 vertAlign borderR">Дата поступления</div>
        <div class="col-md-1 vertAlign borderR">Дата окончания</div>
        <div class="col-md-6 vertAlign borderR">Название уч. заведения</div>
        <div class="col-md-3 vertAlign borderR">Специальность</div>
      </div>
      <div
        v-for="education in employee.educations"
        v-bind:key="education.id"
        class="row text-center"
      >
        <div class="col-md-1 vertAlign borderR">
          <input autocomplete="off" class="form-control form-control-sm" v-model="education.start" />
        </div>
        <div class="col-md-1 vertAlign borderR">
          <input autocomplete="off" class="form-control form-control-sm" v-model="education.end" />
        </div>
        <div class="col-md-6 vertAlign borderR">
          <input autocomplete="off" class="form-control form-control-sm" v-model="education.title" />
        </div>
        <div class="col-md-3 vertAlign borderR">
          <input
            autocomplete="off"
            class="form-control form-control-sm"
            v-model="education.speciality"
          />
        </div>
        <div class="col-md-1 my-1">
          <button class="btn btn-danger" @click="deleteEducation(education)">Удалить</button>
        </div>
      </div>
      <button class="btn btn-info" @click="addEducation">Добавить</button>
    </div>

    <!-- дополнительное образование -->
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Дополнительное образование</label>
      <div class="col-sm-10 marginVauto">
        <input
          autocomplete="off"
          class="form-control form-control-sm"
          v-model="employee.additionalEducation"
        />
      </div>
    </div>

    <!-- трудовая деятельность -->
    <br />
    <hr />
    <div>
      <label>Трудовая деятельность</label>
      <div class="row text-center">
        <div class="col-md-1 vertAlign borderR">Дата начала</div>
        <div class="col-md-1 vertAlign borderR">Дата окончания</div>
        <div class="col-md-2 vertAlign borderR">Наименование организации</div>
        <div class="col-md-2 vertAlign borderR">Должность</div>
        <div class="col-md-3 vertAlign borderR">Адрес</div>
        <div class="col-md-2 vertAlign borderR">Причина увольнения</div>
      </div>
      <div v-for="work in employee.works" v-bind:key="work.id" class="row text-center">
        <div class="col-md-1 vertAlign borderR">
          <input autocomplete="off" class="form-control form-control-sm" v-model="work.start" />
        </div>
        <div class="col-md-1 vertAlign borderR">
          <input autocomplete="off" class="form-control form-control-sm" v-model="work.end" />
        </div>
        <div class="col-md-2 vertAlign borderR">
          <input autocomplete="off" class="form-control form-control-sm" v-model="work.title" />
        </div>
        <div class="col-md-2 vertAlign borderR">
          <input autocomplete="off" class="form-control form-control-sm" v-model="work.post" />
        </div>
        <div class="col-md-3 vertAlign borderR">
          <input autocomplete="off" class="form-control form-control-sm" v-model="work.address" />
        </div>
        <div class="col-md-2 vertAlign borderR">
          <input autocomplete="off" class="form-control form-control-sm" v-model="work.dismissal" />
        </div>
        <div class="col-md-1 my-1">
          <button class="btn btn-danger" @click="deleteWork(work)">Удалить</button>
        </div>
      </div>
      <button class="btn btn-info" @click="addWork">Добавить</button>
    </div>
    <hr />

    <!-- Спорт-->
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Спортивные увлечения/достижения</label>
      <div class="col-sm-10 marginVauto">
        <input
          autocomplete="off"
          class="form-control form-control-sm"
          v-model="employee.sport"
        />
      </div>
    </div>

    <!-- Компьютер-->
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Знание компьютера</label>
      <div class="col-sm-10 marginVauto">
        <input
          autocomplete="off"
          class="form-control form-control-sm"
          v-model="employee.computer"
        />
      </div>
    </div>

    <!-- служба в армии-->
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Служба в армии</label>
      <div class="col-sm-10 marginVauto">
        <input
          autocomplete="off"
          class="form-control form-control-sm"
          v-model="employee.army"
        />
      </div>
    </div>

    <!-- вредные привычки-->
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Вредные привычки</label>
      <div class="col-sm-10 marginVauto">
        <input
          autocomplete="off"
          class="form-control form-control-sm"
          v-model="employee.badHabbits"
        />
      </div>
    </div>

    <!-- хобби -->
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Хобби</label>
      <div class="col-sm-10 marginVauto">
        <input
          autocomplete="off"
          class="form-control form-control-sm"
          v-model="employee.goodHabbits"
        />
      </div>
    </div>

    <!-- ненормированные день -->
    <div class="form-group row">
      <div class="col-md-12">
        <label for="irregular" class="col-form-label">Готовность к ненормированному рабочему дню</label>
        <input
          type="checkbox"
          class="marginVauto marginL30"
          id="irregular"
          v-model="employee.irregular"
        />
      </div>
    </div>
    <div class="my-4 d-flex justify-content-center">
      <button class="btn btn-success" @click="update" v-if="canChange">Сохранить</button>
      <button class="btn btn-success" @click="save" v-else>Сохранить</button>
      <button class="btn btn-danger mx-4" @click="deleteEmp" v-if="canChange">Удалить сотрудника</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['employeeInput'],
  data() {
    return {
      employee: {
        entity: "",
        object: "",
        surname: "",
        name: "",
        patronymic: "",
        birthday: "",
        citizenship: "",
        placeBirth: "",
        address: "",
        registration: "",
        homePhone: "",
        phone: "",
        passport: "",
        familyStatus: "",
        additionalEducation: "",
        sport: "",
        computer: "",
        army: "",
        badHabbits: "",
        goodHabbits: "",
        irregular: 0,
        relatives: [],
        educations: [],
        works: []
      }
    }
  },
  computed:{
    canChange(){
      return this.employeeInput != null;
    }
  },
  methods: {
    addRelative() {
      this.employee.relatives.push({ degree: "", fio: "", birthday: "", work: "", phone: "", address: "" });
    },
    deleteRelative(relative) {
      this.employee.relatives.splice(this.employee.relatives.indexOf(relative), 1);
    },
    addEducation() {
      this.employee.educations.push({ start: "", end: "", title: "", speciality: "" });
    },
    deleteEducation(education) {
      this.employee.educations.splice(this.employee.educations.indexOf(education), 1);
    },
    addWork() {
      this.employee.works.push({ start: "", end: "", title: "", post: "", address: "", dismissal: "" })
    },
    deleteWork(work) {
      this.employee.works.splice(this.employee.works.indexOf(work), 1);
    },
    save() {
      this.$http
        .post(this.$store.state.host + "/api/employee", {
          employee: this.employee
        })
        .then(function (response) {
          window.location.href = this.$store.state.host+"/";
        })
    },
    update(){
      this.$http
        .put(this.$store.state.host + "/api/employee/" + this.employee.id, {
          employee: this.employee
        })
        .then(function (response) {
          window.location.href = this.$store.state.host+"/employee/"+this.employee.id;
        })
    },
    deleteEmp(){
      if (confirm("Удалить данного сотрудника?")){
        this.$http
          .delete(this.$store.state.host + "/api/employee/" + this.employee.id)
          .then(function (response){
            //console.log(response.data);
            window.location.href = this.$store.state.host+"/";
          })
      }
    }
  },
  mounted() {
    if (this.employeeInput != null) {
      this.employee = this.employeeInput;
    }
  }
}
</script>

<style>
.marginVauto {
  margin: auto 0;
}
.borderR {
  border-right: 1px solid rgb(185, 185, 185);
}
.vertAlign {
  display: flex;
  align-items: center;
  justify-content: center;
}
.marginL30 {
  margin-left: 30px;
}
</style>