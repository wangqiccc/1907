(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-789cbf90"],{"00bd":function(t,e,a){"use strict";a.r(e);var r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("basic-header",{attrs:{items:["系统管理","轮播管理"]}}),a("el-card",[a("el-tabs",{model:{value:t.activeName,callback:function(e){t.activeName=e},expression:"activeName"}},[a("el-tab-pane",{attrs:{label:"轮播查看",name:"list"}},[a("el-table",{attrs:{data:t.tableData}},[a("el-table-column",{attrs:{label:"id",prop:"id",width:"100"}}),a("el-table-column",{attrs:{label:"图片",prop:"url",align:"center"},scopedSlots:t._u([{key:"default",fn:function(t){return[a("img",{attrs:{src:t.row.url,alt:"",width:"100",height:"50"}})]}}])}),a("el-table-column",{attrs:{label:"排序",prop:"sort",align:"center"}}),a("el-table-column",{attrs:{label:"操作"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{type:"text"},on:{click:function(a){return t.edit(e.row)}}},[t._v("编辑")]),a("el-button",{attrs:{type:"text"},on:{click:function(a){return t.del(e.row.id)}}},[t._v("删除")])]}}])})],1)],1),a("el-tab-pane",{attrs:{label:"轮播添加",name:"add"}},[a("el-row",[a("el-col",{attrs:{span:12}},[a("el-form",{ref:"submitForm",attrs:{model:t.submitForm,rules:t.rules,"label-width":"80px"}},[a("el-form-item",{attrs:{label:"排序",prop:"sort"}},[a("el-input",{model:{value:t.submitForm.sort,callback:function(e){t.$set(t.submitForm,"sort",e)},expression:"submitForm.sort"}})],1),a("el-form-item",{attrs:{label:"商品id",prop:"gid"}},[a("el-input",{model:{value:t.submitForm.gid,callback:function(e){t.$set(t.submitForm,"gid",e)},expression:"submitForm.gid"}})],1),a("el-form-item",{attrs:{label:"图片",prop:"url"}},[a("el-upload",{staticClass:"avatar-uploader",attrs:{action:t.uploadUrl,"show-file-list":!1,"on-success":t.handleAvatarSuccess,"before-upload":t.beforeAvatarUpload}},[t.submitForm.url?a("img",{staticClass:"avatar",attrs:{src:t.submitForm.url}}):a("i",{staticClass:"el-icon-plus avatar-uploader-icon"}),a("div",{staticClass:"el-upload__tip",attrs:{slot:"tip"},slot:"tip"},[t._v("只能上传jpg文件，且不超过500kb")])])],1),a("el-form-item",[a("el-button",{attrs:{type:"primary"},on:{click:t.submit}},[t._v("提交")])],1)],1)],1)],1)],1)],1)],1),a("el-dialog",{attrs:{title:"提示",visible:t.dialogVisible,width:"50%"},on:{"update:visible":function(e){t.dialogVisible=e}}},[a("el-form",{ref:"updateForm",attrs:{model:t.updateForm,rules:t.rules,"label-width":"80px"}},[a("el-form-item",{attrs:{label:"排序",prop:"sort"}},[a("el-input",{model:{value:t.updateForm.sort,callback:function(e){t.$set(t.updateForm,"sort",e)},expression:"updateForm.sort"}})],1),a("el-form-item",{attrs:{label:"商品id",prop:"gid"}},[a("el-input",{model:{value:t.updateForm.gid,callback:function(e){t.$set(t.updateForm,"gid",e)},expression:"updateForm.gid"}})],1),a("el-form-item",{attrs:{label:"图片",prop:"url"}},[a("el-upload",{staticClass:"avatar-uploader",attrs:{action:t.uploadUrl,"show-file-list":!1,"on-success":t.handleAvatarSuccess1,"before-upload":t.beforeAvatarUpload}},[t.updateForm.url?a("img",{staticClass:"avatar",attrs:{src:t.updateForm.url}}):a("i",{staticClass:"el-icon-plus avatar-uploader-icon"}),a("div",{staticClass:"el-upload__tip",attrs:{slot:"tip"},slot:"tip"},[t._v("只能上传jpg文件，且不超过500kb")])])],1)],1),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(e){t.dialogVisible=!1}}},[t._v("取 消")]),a("el-button",{attrs:{type:"primary"},on:{click:t.update}},[t._v("确 定")])],1)],1)],1)},s=[],i=a("0418"),l={data:function(){return{activeName:"list",tableData:[],api:"/api/banners/banners",submitForm:{url:"",sort:"",gid:""},rules:{url:{required:!0,message:"请选择图片"},sort:{required:!0,message:"请输入图片排序",trigger:"blur"},gid:{required:!0,message:"请输入绑定商品id",trigger:"blur"}},uploadUrl:"/api/upload/upload",dialogVisible:!1,updateForm:{}}},methods:{fetchData:function(){var t=this;this.axios.get(this.api).then((function(e){200===e.data.code&&(t.tableData=e.data.data)}))},handleAvatarSuccess:function(t){this.submitForm.url=t,this.$refs.submitForm.validateField("url")},handleAvatarSuccess1:function(t){this.updateForm.url=t,this.$refs.updateForm.validateField("url")},beforeAvatarUpload:function(t){var e="image/jpeg"===t.type,a=t.size/1024<500;return e||this.$message.error("上传商品图片只能是 JPG 格式!"),a||this.$message.error("上传商品图片大小不能超过500kb!"),e&&a},submit:function(){var t=this;this.$refs.submitForm.validate((function(e){e?t.axios.post(t.api,t.submitForm).then((function(e){200===e.data.code&&(t.$message.success("提交成功"),t.activeName="list",t.$refs.submitForm.resetFields(),t.fetchData())})):t.$message.error("验证失败")}))},del:function(t){var e=this;this.$confirm("此操作将永久删除该信息, 是否继续?","提示",{confirmButtonText:"确定",cancelButtonText:"取消",type:"warning"}).then((function(){e.axios.delete(e.api,{params:{id:t}}).then((function(t){200===t.data.code&&(e.$message.success("删除成功"),e.fetchData())}))})).catch((function(){e.$message({type:"info",message:"已取消删除"})}))},edit:function(t){this.updateForm=t,this.dialogVisible=!0},update:function(){var t=this;this.$refs.updateForm.validate((function(e){e?(delete t.updateForm.create_time,t.axios.put(t.api,t.updateForm).then((function(e){200===e.data.code&&(t.$message.success("修改成功"),t.dialogVisible=!1,t.fetchData())}))):t.$message.error("验证失败")}))}},components:{"basic-header":i["a"]},created:function(){this.fetchData()},mounted:function(){}},o=l,u=(a("bc37"),a("2877")),n=Object(u["a"])(o,r,s,!1,null,"314707c0",null);e["default"]=n.exports},"0418":function(t,e,a){"use strict";var r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("el-breadcrumb",{staticStyle:{"margin-bottom":"30px"},attrs:{separator:"/"}},t._l(t.items,(function(e){return a("el-breadcrumb-item",{key:e},[t._v(t._s(e))])})),1)},s=[],i={data:function(){return{}},props:{items:{type:Array,required:!0}},methods:{},created:function(){},mounted:function(){}},l=i,o=a("2877"),u=Object(o["a"])(l,r,s,!1,null,"145a1096",null);e["a"]=u.exports},"43cb":function(t,e,a){},bc37:function(t,e,a){"use strict";var r=a("43cb"),s=a.n(r);s.a}}]);
//# sourceMappingURL=chunk-789cbf90.db90ada5.js.map