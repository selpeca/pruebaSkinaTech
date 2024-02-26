<template>
    <a-row type="flex">
        <a-col :flex="2">
            <a-form
                layout="inline"
                :model="formState"
                @finish="handleFinish"
                @finishFailed="handleFinishFailed"
            >
                <a-form-item>
                <a-input v-model:value="formState.user" placeholder="Username">
                    <template #prefix><UserOutlined style="color: rgba(0, 0, 0, 0.25)" /></template>
                </a-input>
                </a-form-item>
                <a-form-item>
                <a-input v-model:value="formState.password" type="password" placeholder="Password">
                    <template #prefix><LockOutlined style="color: rgba(0, 0, 0, 0.25)" /></template>
                </a-input>
                </a-form-item>
                <a-form-item>
                <a-button
                    type="primary"
                    html-type="submit"
                    :disabled="formState.user === '' || formState.password === ''"
                >
                    Log in
                </a-button>
                </a-form-item>
            </a-form>
        </a-col>
        <a-col :flex="3">3 / 5</a-col>
    </a-row>
</template>
<script>
import api from '../../api.js';
import { Form } from 'ant-design-vue';
import { UserOutlined, LockOutlined } from '@ant-design/icons-vue';
import { defineComponent, reactive, UnwrapRef } from 'vue';

const { useForm } = Form;

export default defineComponent({
  setup(props) {
    let formState = reactive({
      user: 'admin',
      password: 'admin',
    });
    const rules = reactive({
      user: [
          {
              required: true,
              message: 'Por favor digita el usuario',
              trigger: 'blur'
          },
      ],
      password: [
          {
              required: true,
              message: 'Por favor digita la contraseña',
              trigger: 'blur'
          },
      ]
    });
    const {
        resetFields,
        validate,
        validateInfos: validationErrors
    } = useForm(formState, rules);
    // const router = useRouter();
    const handleFinish = (values) => {
      console.log(values, formState);
      validate()
                .then(
                    async () => {
                      const user = await api.helpPost(`user/login`,formState);
                      console.log(user);
                        // router.push({ name: 'book-item', params: { bookId: book.id } });
                    }
                )
                .catch(() => {
                });
    };
    const handleFinishFailed = (errors) => {
      console.log(errors);
    };
    return {
      formState,
      handleFinish,
      handleFinishFailed,
    };
  },
  components: {
    UserOutlined,
    LockOutlined,
  },
});
</script>