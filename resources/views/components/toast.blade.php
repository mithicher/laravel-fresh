<div
	x-data="{
		notices: [],
		visible: [],
		add(notice) {
			notice.id = Date.now()
			notice.animationTime = this.getAnimationTime()
			this.notices.push(notice)
			this.fire(notice)
		},
		getAnimationTime() {
			const delta = 1
			const transitionTime = 800
			return (5000 * delta) - (transitionTime * delta)
		},
		fire(notice) {
			this.visible.push(notice)
			setTimeout(() => {
				this.remove(notice.id)
			}, notice.animationTime)
		},
		remove(id) {
			const notice = this.visible.find(notice => notice.id === id)
			const index = this.visible.indexOf(notice)
			this.visible.splice(index, 1)
		}
	}"
	@notify.window="add($event.detail)"
	x-cloak
	class="fixed flex flex-col-reverse bottom-0 left-0 items-start sm:items-end justify-end pointer-events-none px-6 pb-10 pt-10 space-y-4" style="z-index: 2000">
	<template x-for="notice in notices" :key="notice.id">
		<div
			x-show="visible.includes(notice)"
			x-transition:enter="transition ease-in duration-300"
			x-transition:enter-start="transform opacity-0 -translate-y-2"
			x-transition:enter-end="transform opacity-100"
			x-transition:leave="transition ease-out duration-500"
			x-transition:leave-start="transform translate-x-0 opacity-100"
			x-transition:leave-end="transform -translate-x-full opacity-0"
			x-on:click="remove(notice.id)"
			class="max-w-sm w-full shadow-md cursor-pointer pointer-events-auto rounded-xl bg-white text-gray-600"
			>
			<div class="overflow-hidden flex relative px-3 py-3 rounded-lg w-80">
				<div class="flex-shrink-0 mr-3">
                    <template x-if="['info', 'notice'].includes(notice.type)">
                        <svg class="w-6 h-6 fill-current text-blue-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    </template>
                    <template x-if="notice.type === 'success'">
                        <svg class="w-6 h-6 fill-current text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </template>
                    <template x-if="notice.type === 'error'">
                        <svg class="w-6 h-6 fill-current text-red-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    </template>
                </div>
				<div class="flex-1 pt-px font-bold" x-text="notice.text"></div>
			</div>
		</div>
	</template>
</div>
