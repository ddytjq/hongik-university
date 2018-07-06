public class CPU_running{
	public ReadyQueue queue; // 레디큐
	public int cburst[]; // cpu burst
	public int carray[]; // 프로세서별 cpu 배열
	public int num; //프로세스 개수
	public int allcputime[]; //프로세스별 총 cpu 시간 
	public IO io;
	public int i;

	public CPU_running(int num, int cburst[], int allcputime[], ReadyQueue q, IO io){
		this.num = num;
		this.cburst = cburst;
		this.carray = new int[num];
		this.allcputime = allcputime;
		this.queue = q;
		this.io = io;
	}

	public void cpuing(int a){
		i = a;
		if(allcputime[i] >= cburst[i]){
			cburst[i] -= 1;
			allcputime[i] -= 1;
			carray[i] += 1;
		}
		else if(allcputime[i] < cburst[i]){
			allcputime[i] = 0;
			cburst[i] += 0;
			carray[i] += 0;
		}
		if(cburst[i] == 0){
			queue.remove();
			io.IOinsert(i);
			queue.counterrq();
			i++;
			if(i == num)
				i = 0;
		}
	}
}