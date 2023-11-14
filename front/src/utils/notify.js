import { Notify } from 'quasar';

const notifySuccess = (message = 'Ação realizada com sucesso!') =>
  Notify.create({
    color: 'green-7',
    type: 'positive',
    progress: true,
    message,
  });

const notifyError = (message = 'Ops! Ocorreu um problema durante esta ação.') =>
  Notify.create({
    color: 'red-7',
    type: 'negative',
    progress: true,
    message,
  });

const notifyInfo = (message) =>
  Notify.create({
    color: 'blue-7',
    type: 'info',
    progress: true,
    message,
  });

export { notifyError, notifyInfo, notifySuccess };