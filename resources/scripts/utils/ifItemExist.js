export const ifItemExist = (el, func) => {
  if (typeof el !== undefined && el !== null && el.length !== 0) {
    func();
  }
};
