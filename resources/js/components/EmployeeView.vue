<template>
  <div class="employeeForm">
    <!-- Юр лицо и объект -->
    <div class="row my-3">
      <div class="col-md-6 row">
        <div class="col-sm-3">Юр. лицо</div>
        <div class="col-sm-9">{{employee.entity}}</div>
      </div>
      <div class="col-md-6 row">
        <div class="col-sm-3">Объект</div>
        <div class="col-sm-9">{{employee.object}}</div>
      </div>
    </div>

    <!-- ФИО -->
    <div class="row my-3">
      <div class="col-md-4 row">
        <div class="col-sm-4">Фамилия</div>
        <div class="col-sm-8">{{employee.surname}}</div>
      </div>
      <div class="col-md-4 row">
        <div class="col-sm-4">Имя</div>
        <div class="col-sm-8">{{employee.name}}</div>
      </div>
      <div class="col-md-4 row">
        <div class="col-sm-4">Отчество</div>
        <div class="col-sm-8">{{employee.patronymic}}</div>
      </div>
    </div>

    <!-- дата рождения, гражданство -->
    <div class="row my-3">
      <div class="col-md-6 row">
        <div class="col-sm-3">Дата рождения</div>
        <div class="col-sm-9">{{employee.birthday}}</div>
      </div>
      <div class="col-md-6 row">
        <div class="col-sm-3">Гражданство</div>
        <div class="col-sm-9">{{employee.citizenship}}</div>
      </div>
    </div>

    <!-- мето рождения -->
    <div class="row my-3">
      <div class="col-sm-5">Место рождения (село, город, край, область, республика)</div>
      <div class="col-sm-7">{{employee.placeBirth}}</div>
    </div>

    <!-- адрес -->
    <div class="row my-3">
      <div class="col-sm-5">Адрес (место жительства): индекс, область, город, улица, дом, квартира</div>
      <div class="col-sm-7">{{employee.address}}</div>
    </div>

    <!-- прописка -->
    <div class="row my-3">
      <div class="col-sm-5">Адрес (место прописки): индекс, область, город, улица, дом, квартира</div>
      <div class="col-sm-7">{{employee.registration}}</div>
    </div>

    <!-- телефоны -->
    <div class="row my-3">
      <div class="col-md-5 row">
        <div class="col-sm-4">Домашний тел.</div>
        <div class="col-sm-8">{{employee.homePhone}}</div>
      </div>
      <div class="col-md-7 row">
        <div class="col-sm-3">Сотовый тел.</div>
        <div class="col-sm-9">{{employee.phone}}</div>
      </div>
    </div>

    <!-- паспорт -->
    <div class="row my-3">
      <div class="col-sm-2">Паспортные данные</div>
      <div class="col-sm-10">{{employee.passport}}</div>
    </div>

    <!-- семейное положение -->
    <div class="row my-3">
      <div class="col-sm-2">Семейное положение</div>
      <div class="col-sm-10">{{employee.familyStatus}}</div>
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
        <div class="col-md-1 vertAlign borderR">{{relative.degree}}</div>
        <div class="col-md-2 vertAlign borderR">{{relative.fio}}</div>
        <div class="col-md-1 vertAlign borderR">{{relative.birthday}}</div>
        <div class="col-md-2 vertAlign borderR">{{relative.work}}</div>
        <div class="col-md-2 vertAlign borderR">{{relative.phone}}</div>
        <div class="col-md-3 vertAlign">{{relative.address}}</div>
        <div class="col-md-1 my-1">
        </div>
      </div>      
      <div v-if="employee.relatives.length == 0">Нет</div>
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
        <div class="col-md-1 vertAlign borderR">{{education.start}}</div>
        <div class="col-md-1 vertAlign borderR">{{education.end}}</div>
        <div class="col-md-6 vertAlign borderR">{{education.title}}</div>
        <div class="col-md-3 vertAlign borderR">{{education.speciality}}</div>
        <div class="col-md-1 my-1">
        </div>
      </div>
      <div v-if="employee.educations.length == 0">Нет</div>
    </div>

    <!-- дополнительное образование -->
    <div class="row my-3">
      <div class="col-sm-3">Дополнительное образование</div>
      <div class="col-sm-9">{{employee.additionalEducation}}</div>
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
        <div class="col-md-1 vertAlign borderR">{{work.start}}</div>
        <div class="col-md-1 vertAlign borderR">{{work.end}}</div>
        <div class="col-md-2 vertAlign borderR">{{work.title}}</div>
        <div class="col-md-2 vertAlign borderR">{{work.post}}</div>
        <div class="col-md-3 vertAlign borderR">{{work.address}}</div>
        <div class="col-md-2 vertAlign borderR">{{work.dismissal}}</div>
        <div class="col-md-1 my-1">
        </div>
      </div>
      <div v-if="employee.works.length == 0">Нет</div>
    </div>
    <hr />

    <!-- Спорт-->
    <div class="row my-3">
      <div class="col-sm-3">Спортивные увлечения/достижения</div>
      <div class="col-sm-9">{{employee.sport}}</div>
    </div>

    <!-- Компьютер-->
    <div class="row my-3">
      <div class="col-sm-3">Знание компьютера</div>
      <div class="col-sm-9">{{employee.computer}}</div>
    </div>

    <!-- служба в армии-->
    <div class="row my-3">
      <div class="col-sm-3">Служба в армии</div>
      <div class="col-sm-9">{{employee.army}}</div>
    </div>

    <!-- вредные привычки-->
    <div class="row my-3">
      <div class="col-sm-3">Вредные привычки</div>
      <div class="col-sm-9">{{employee.badHabbits}}</div>
    </div>

    <!-- хобби -->
    <div class="row my-3">
      <div class="col-sm-3">Хобби</div>
      <div class="col-sm-9">{{employee.goodHabbits}}</div>
    </div>

    <!-- ненормированные день -->
    <div class="row">
        <div class="col-md-6">Готовность к ненормированному рабочему дню </div>
        <div class="col-md-6"><strong>{{employee.irregular ? 'Да':'Нет'}}</strong></div>
    </div>
    <div class="my-4 d-flex justify-content-center">
      <a class="btn btn-primary" :href="hrefEdit">Изменить</a>
    </div>
  </div>
</template>

<script>
export default {
  props: ['employee'],
  computed:{
    hrefEdit(){
      return "/employee/" + this.employee.id + "/edit";
    }
  },
  mounted() {
    console.log(this.employee);
  }
}
</script>