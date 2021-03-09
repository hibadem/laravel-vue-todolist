<template>
  <div>
      <!-- <table class="table table-hover">
                    <tr v-show="todoList.length === 0">
                        <td colspan="3">Yapılacak iş kalmadı.</td>
                    </tr>
                    <tr v-for="(item,index) in todoList">
                        <td >
                            <a href="#" class="btn btn-sm btn-danger" v-show="!item.status" @click="todoListStatus(index)"><i class="fa fa-times"></i></a>

                        </td>
                        <td class="text-left w-100">{{item.title}}</td>
                        <td class="text-right">
                            <a href="#" class="btn btn-sm btn-danger" @click="deleteItem(item.id)">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </table>
                <h5 class="mt-5">Tamamlananlar</h5>
                <table class="table table-hover">
                    <tr v-show="todoListFinished.length === 0">
                        <td colspan="3">Tamamlanan iş bulunamadı.</td>
                    </tr>
                    <tr v-for="(item,index) in todoListFinished">
                        <td @click="todoListFinishedStatus">
                            <a href="#" class="btn btn-sm btn-success" v-show="item.status" @click="todoListFinishedStatus(index)"><i class="fa fa-check"></i></a>

                        </td>
                        <td class="text-left w-100">{{item.title}}</td>
                        <td class="text-right">
                            <a href="#" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </table> -->
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>